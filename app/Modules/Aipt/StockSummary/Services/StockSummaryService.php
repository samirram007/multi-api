<?php

namespace Modules\Aipt\StockSummary\Services;

use Modules\Aipt\StorageUnit\Models\StorageUnit;
use Modules\Aipt\StockItem\Models\StockItem;
use Modules\Aipt\StockJournal\Models\StockJournal;
use Modules\Aipt\StockJournalEntry\Models\StockJournalEntry;
use Modules\Aipt\StockJournalStorageUnitEntry\Models\StockJournalStorageUnitEntry;
use Modules\Aipt\StockSummary\Contracts\StockSummaryServiceInterface;
use Modules\Aipt\StockSummary\Models\StockSummary;
use Modules\Aipt\UserFiscalYear\Contracts\UserFiscalYearServiceInterface;
use Modules\Aipt\UserFiscalYear\Models\UserFiscalYear;
use Modules\Aipt\Voucher\Models\Voucher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class StockSummaryService implements StockSummaryServiceInterface
{
    protected $resource = [];

    protected $userFiscalYearService;
    protected $userFiscalYear;

    public function __construct(UserFiscalYearServiceInterface $userFiscalYearService)
    {
        $this->userFiscalYearService = $userFiscalYearService;

        $this->userFiscalYear = $this->userFiscalYearService->getByUserId(auth()->id());

    }

    public function stockInHand(): array
    {

        $fiscalYearId = $this->userFiscalYear->fiscal_year_id;

        $items = StockItem::withWhereHas(
            'stock_journal_entries.stock_journal.voucher',
            fn($q) => $q->where('fiscal_year_id', $fiscalYearId)
        )
            ->with([
                'stock_unit',
                'stock_journal_entries' => function ($q) use ($fiscalYearId) {
                    $q->whereHas(
                        'stock_journal.voucher',
                        fn($v) => $v->where('fiscal_year_id', $fiscalYearId)
                    )
                        ->with([
                            'stock_journal.voucher',
                            'stock_journal_storage_unit_entries.storage_unit',
                        ]);
                },
            ])
            ->get();
        // $items = StockItem::with([
        //     'stock_unit',
        //     'stock_journal_entries.stock_journal.voucher' => function ($q) use ($fiscalYearId) {
        //         $q->where('fiscal_year_id', $fiscalYearId)->where('stock_journal_id', '!=', null);
        //     }
        // ])->get();
        //Log::info(json_encode($items->toArray()));
        $result = [];
        foreach ($items as $index => $item) {
            // $stock = $this->calculateStockInHand($item);
            $stock = $this->calculateItemTotal($item->stock_journal_entries);
            //dd($stock);
            $result[$index]['item_id'] = $item->id;
            $result[$index]['item_name'] = $item->name;
            $result[$index]['unit_code'] = $item->stock_unit ? $item->stock_unit->code : null;
            $result[$index]['unit_name'] = $item->stock_unit ? $item->stock_unit->name : null;
            $result[$index]['no_of_decimal_places'] = $item->stock_unit ? $item->stock_unit->no_of_decimal_places : null;
            $result[$index]['inward_quantity'] = $stock['in'];
            $result[$index]['outward_quantity'] = $stock['out'];
            $result[$index]['closing_quantity'] = $stock['balance'];


        }


        return $result;


    }
    protected function calculateStockInHand(StockItem $item): array|int|float
    {
        // dump($item->toArray());
        $in = $item->stock_journal_entries
            ->where('movement_type', 'in')
            ->sum('actual_quantity');

        $out = $item->stock_journal_entries
            ->where('movement_type', 'out')
            ->sum('actual_quantity');
        // dump($in, $out);
        return ['in' => $in, 'out' => $out, 'balance' => $in - $out];
    }

    public function stock_in_hand_item_wise(): array
    {
        $fiscalYearId = $this->userFiscalYear->fiscal_year_id;

        $items = StockItem::with([
            'stock_unit',
            'stock_journal_entries' => function ($query) use ($fiscalYearId) {
                $query->whereHas('stock_journal.voucher', function ($q) use ($fiscalYearId) {
                    $q->where('fiscal_year_id', $fiscalYearId)
                        ->where('stock_journal_id', '!=', null);
                });
            }
        ])->get();

        $result = [];

        foreach ($items as $item) {

            $storage_unitCollection = [];

            // GROUP BY STORAGE_UNIT ACROSS ALL ENTRIES
            $allStorageUnitEntries = $item->stock_journal_entries
                ->flatMap(fn($e) => $e->stock_journal_storage_unit_entries)
                ->groupBy('storage_unit_id');
            //dump($allStorageUnitEntries->toArray());

            foreach ($allStorageUnitEntries as $storage_unitId => $entries) {

                // $inwardQuantity = $entries
                //     ->where('movement_type', 'in')
                //     ->sum('actual_quantity');

                // $outwardQuantity = $entries
                //     ->where('movement_type', 'out')
                //     ->sum('actual_quantity');
                $storage_unitTotal = $this->calculateStorageUnitTotal($entries);

                $storage_unit = $entries->first()->storage_unit;

                $storage_unitCollection[] = [
                    'storage_unit_id' => $storage_unit->id,
                    'storage_unit_name' => $storage_unit->name,
                    'storage_unit_code' => $storage_unit->code,
                    'inward_quantity' => $storage_unitTotal['in'],
                    'outward_quantity' => $storage_unitTotal['out'],
                    'closing_quantity' => $storage_unitTotal['balance'],
                    // 'inward_quantity' => $inwardQuantity,
                    // 'outward_quantity' => $outwardQuantity,
                    // 'closing_quantity' => $inwardQuantity - $outwardQuantity,
                ];
            }

            $itemTotal = $this->calculateItemTotal($item->stock_journal_entries);

            //compare with $storage_unitCollection  $itemTotal
            //dd($itemTotal);
            if ($storage_unitCollection) {
                $calculatedInward = array_sum(array_column($storage_unitCollection, 'inward_quantity'));
                $calculatedOutward = array_sum(array_column($storage_unitCollection, 'outward_quantity'));
                $calculatedClosing = array_sum(array_column($storage_unitCollection, 'closing_quantity'));
                if (
                    $calculatedClosing != $itemTotal['balance'] ||
                    $calculatedInward != $itemTotal['in'] ||
                    $calculatedOutward != $itemTotal['out']
                ) {

                    $falseQuantity = [
                        'storage_unit_id' => null,
                        'storage_unit_name' => 'Mismatch in total',
                        'storage_unit_code' => null,
                        'inward_quantity' => $itemTotal['in'] - $calculatedInward,
                        'outward_quantity' => $itemTotal['out'] - $calculatedOutward,
                        'closing_quantity' => $itemTotal['balance'] - $calculatedClosing,
                    ];
                    //dd('Mismatch in totals for item ID: '.$item->id);
                    $storage_unitCollection[] = $falseQuantity;
                }
            }



            $result[] = [
                'item_id' => $item->id,
                'item_name' => $item->name,
                'unit_code' => $item->stock_unit?->code,
                'unit_name' => $item->stock_unit?->name,
                'inward_quantity' => $itemTotal['in'],
                'outward_quantity' => $itemTotal['out'],
                'closing_quantity' => $itemTotal['balance'],
                'storage_unit_details' => $storage_unitCollection,
            ];
        }

        return $result;
    }

    protected function calculateItemTotal($stock_journal_entries): array|int|float
    {
        //dd($item_entry->toArray());
        $in = $stock_journal_entries
            ->where('movement_type', 'in')
            ->sum('actual_quantity');
        //dump($in);

        $out = $stock_journal_entries
            ->where('movement_type', 'out')
            ->sum('actual_quantity');
        // dump($in, $out);
        return ['in' => $in, 'out' => $out, 'balance' => $in - $out];
    }
    protected function calculateStorageUnitTotal($stock_journal_storage_unit_entries): array|int|float
    {
        //dd($storage_unit_entry->toArray());
        $in = $stock_journal_storage_unit_entries
            ->where('movement_type', 'in')
            ->sum('actual_quantity');

        $out = $stock_journal_storage_unit_entries
            ->where('movement_type', 'out')
            ->sum('actual_quantity');
        //dd($in, $out);
        return ['in' => $in, 'out' => $out, 'balance' => $in - $out];
    }
    public function stock_in_hand_storage_unit_wise1(): array
    {
        $fiscalYearId = $this->userFiscalYear->fiscal_year_id;
        $storage_units = StorageUnit::withWhereHas(
            'stock_journal_storage_unit_entries.stock_journal_entry.stock_journal.voucher',
            fn($q) => $q->where('fiscal_year_id', $fiscalYearId)
        )
            ->with([
                'stock_journal_storage_unit_entries' => function ($q) {
                    $q->whereHas('stock_journal_entry')
                        ->with([
                            'stock_journal_entry.stock_item.stock_unit',
                            'stock_journal_entry.stock_journal.voucher',
                        ]);
                },
            ])
            ->get();
        //dd($storage_units->toArray());
        $result = [];
        foreach ($storage_units as $storage_unit) {
            $stock = $this->calculateStorageUnitTotal($storage_unit->stock_journal_storage_unit_entries);
            dd($stock);
            $result[] = [
                'storage_unit_id' => $storage_unit->id,
                'storage_unit_name' => $storage_unit->name,
                'storage_unit_code' => $storage_unit->code,
                'inward_quantity' => $stock['in'],
                'outward_quantity' => $stock['out'],
                'closing_quantity' => $stock['balance'],
                'item_details' => $storage_unit->stock_journal_storage_unit_entries
                    ->groupBy('stock_journal_entry.stock_item.id')
                    ->map(function ($entries) {
                        $entry = $entries->first()->stock_journal_entry;

                        if (!$entry || !$entry->stock_item) {
                            return null;
                        }

                        $item = $entry->stock_item;

                        $itemTotal = $this->calculateItemTotal(
                            $entries->map(fn($e) => $e->stock_journal_entry)
                        );

                        return [
                            'item_id' => $item->id,
                            'item_name' => $item->name,
                            'unit_code' => $item->stock_unit?->code,
                            'unit_name' => $item->stock_unit?->name,
                            'no_of_decimal_places' => $item->stock_unit?->no_of_decimal_places,
                            'inward_quantity' => $itemTotal['in'],
                            'outward_quantity' => $itemTotal['out'],
                            'closing_quantity' => $itemTotal['balance'],
                        ];
                    })
                    ->values()
                    ->toArray(),

            ];
        }


        // dd($result);

        return $result;
    }
    public function stock_in_hand_zone_wise(): array
    {
        $fiscalYearId = $this->userFiscalYear->fiscal_year_id;

        $zones = StorageUnit::where('storage_unit_type', 'zone')->get();

        $result = [];

        foreach ($zones as $zone) {

            // Get storage_units under this zone
            $storage_units = StorageUnit::withWhereHas(
                'stock_journal_storage_unit_entries.stock_journal_entry.stock_journal.voucher',
                function ($q) use ($fiscalYearId) {
                    $q->where('fiscal_year_id', $fiscalYearId)
                        ->whereHas('stock_journal');
                }
            )
                ->with([
                    'stock_journal_storage_unit_entries' => function ($q) use ($fiscalYearId) {
                        $q->whereHas(
                            'stock_journal_entry.stock_journal.voucher',
                            fn($v) => $v->where('fiscal_year_id', $fiscalYearId)
                                ->whereHas('stock_journal')
                        )->with([
                                    'stock_journal_entry.stock_item.stock_unit',
                                    'stock_journal_entry.stock_journal.voucher',
                                ]);
                    },
                ])
                ->where('parent_id', $zone->id)
                ->get();

            $zoneStorageUnits = [];
            $zoneTotals = [
                'in' => 0,
                'out' => 0,
                'balance' => 0,
            ];

            foreach ($storage_units as $storage_unit) {

                $itemEntries = $storage_unit->stock_journal_storage_unit_entries
                    ->groupBy(fn($e) => $e->stock_journal_entry->stock_item_id);

                $itemsCollection = [];

                foreach ($itemEntries as $entries) {

                    $item = $entries->first()->stock_journal_entry->stock_item;

                    $itemTotal = $this->calculateStorageUnitTotal($entries);

                    $itemsCollection[] = [
                        'item_id' => $item->id,
                        'item_name' => $item->name,
                        'unit_code' => $item->stock_unit?->code,
                        'unit_name' => $item->stock_unit?->name,

                        'inward_quantity' => $itemTotal['in'],
                        'outward_quantity' => $itemTotal['out'],
                        'closing_quantity' => $itemTotal['balance'],
                    ];

                    // accumulate zone totals
                    $zoneTotals['in'] += $itemTotal['in'];
                    $zoneTotals['out'] += $itemTotal['out'];
                    $zoneTotals['balance'] += $itemTotal['balance'];
                }

                $zoneStorageUnits[] = [
                    'storage_unit_id' => $storage_unit->id,
                    'storage_unit_name' => $storage_unit->name,
                    'storage_unit_code' => $storage_unit->code,

                    'inward_quantity' => array_sum(array_column($itemsCollection, 'inward_quantity')),
                    'outward_quantity' => array_sum(array_column($itemsCollection, 'outward_quantity')),
                    'closing_quantity' => array_sum(array_column($itemsCollection, 'closing_quantity')),

                    'item_details' => $itemsCollection,
                ];
            }

            $result[] = [
                'zone_id' => $zone->id,
                'zone_name' => $zone->name,
                'zone_code' => $zone->code,

                'inward_quantity' => $zoneTotals['in'],
                'outward_quantity' => $zoneTotals['out'],
                'closing_quantity' => $zoneTotals['balance'],

                'storage_units' => $zoneStorageUnits,
            ];
        }

        return $result;
    }
    public function stock_in_hand_storage_unit_wise(): array
    {
        $fiscalYearId = $this->userFiscalYear->fiscal_year_id;

        // $storage_units = StorageUnit::withWhereHas(
        //     'stock_journal_storage_unit_entries.stock_journal_entry.stock_journal.voucher',
        //     fn($q) => $q->where('fiscal_year_id', $fiscalYearId)
        // )->with([
        //             'stock_journal_storage_unit_entries' => function ($q) {
        //                 $q->whereHas('stock_journal_entry')
        //                     ->with([
        //                         'stock_journal_entry.stock_item.stock_unit',
        //                         'stock_journal_entry.stock_journal.voucher',
        //                     ]);
        //             },
        //         ])->get();

        $storage_units = StorageUnit::withWhereHas(
            'stock_journal_storage_unit_entries.stock_journal_entry.stock_journal.voucher',
            function ($q) use ($fiscalYearId) {
                $q->where('fiscal_year_id', $fiscalYearId)
                    ->whereHas('stock_journal');
            }
        )
            ->with([
                'stock_journal_storage_unit_entries' => function ($q) use ($fiscalYearId) {
                    $q->whereHas(
                        'stock_journal_entry.stock_journal.voucher',
                        fn($v) => $v->where('fiscal_year_id', $fiscalYearId)
                            ->whereHas('stock_journal')
                    )
                        ->with([
                            'stock_journal_entry.stock_item.stock_unit',
                            'stock_journal_entry.stock_journal.voucher',
                        ]);
                },
            ])
            ->get();

        $result = [];

        foreach ($storage_units as $storage_unit) {

            $itemEntries = $storage_unit->stock_journal_storage_unit_entries
                ->groupBy(fn($e) => $e->stock_journal_entry->stock_item_id);

            $itemsCollection = [];

            foreach ($itemEntries as $itemId => $entries) {

                $item = $entries->first()
                    ->stock_journal_entry
                    ->stock_item;

                $itemTotal = $this->calculateStorageUnitTotal($entries);

                $itemsCollection[] = [
                    'item_id' => $item->id,
                    'item_name' => $item->name,
                    'unit_code' => $item->stock_unit?->code,
                    'unit_name' => $item->stock_unit?->name,

                    'inward_quantity' => $itemTotal['in'],
                    'outward_quantity' => $itemTotal['out'],
                    'closing_quantity' => $itemTotal['balance'],
                ];
            }

            // if (empty($itemsCollection)) {
            //     continue;
            // }

            $result[] = [
                'storage_unit_id' => $storage_unit->id,
                'storage_unit_name' => $storage_unit->name,
                'storage_unit_code' => $storage_unit->code,
                'inward_quantity' => array_sum(array_column($itemsCollection, 'inward_quantity')),
                'outward_quantity' => array_sum(array_column($itemsCollection, 'outward_quantity')),
                'closing_quantity' => array_sum(array_column($itemsCollection, 'closing_quantity')),
                'item_details' => $itemsCollection,
            ];
        }
        //  dd($result);


        return $result;
    }

    public function stock_in_hand_voucher_wise(): array
    {
        $fiscalYearId = $this->userFiscalYear->fiscal_year_id;

        $items = StockItem::with([
            'stock_unit',
            'stock_journal_entries' => function ($query) use ($fiscalYearId) {
                $query->whereHas('stock_journal.voucher', function ($q) use ($fiscalYearId) {
                    $q->where('fiscal_year_id', $fiscalYearId)
                        ->where('stock_journal_id', '!=', null);
                })->with([
                            'stock_journal.voucher.voucher_type',
                        ]);
            }
        ])->get();

        $result = [];
        foreach ($items as $item) {

            $voucherCollection = [];

            // GROUP BY VOUCHER ACROSS ALL ENTRIES
            $allVoucherEntries = $item->stock_journal_entries
                ->filter(fn($e) => $e->stock_journal && $e->stock_journal->voucher)
                ->groupBy(fn($e) => $e->stock_journal->voucher->id)
                ->sortBy(function ($entries) {
                    $voucher = $entries->first()->stock_journal->voucher;

                    return sprintf(
                        '%03d-%s-%s',
                        $voucher->voucher_type_id,
                        $voucher->voucher_date,
                        $voucher->voucher_no
                    );
                });
            //dump($allVoucherEntries->toArray());

            foreach ($allVoucherEntries as $voucherId => $entries) {

                $voucherTotal = $this->calculateItemTotal($entries);

                $voucher = $entries->first()->stock_journal->voucher;

                $voucherCollection[] = [
                    'voucher_id' => $voucher->id,
                    'voucher_type' => $voucher->voucher_type->name,
                    'voucher_no' => $voucher->voucher_no,
                    'voucher_date' => $voucher->voucher_date,
                    'inward_quantity' => $voucherTotal['in'],
                    'outward_quantity' => $voucherTotal['out'],
                    'closing_quantity' => $voucherTotal['balance'],
                ];
            }

            $itemTotal = $this->calculateItemTotal($item->stock_journal_entries);

            $result[] = [
                'item_id' => $item->id,
                'item_name' => $item->name,
                'unit_code' => $item->stock_unit?->code,
                'unit_name' => $item->stock_unit?->name,
                'inward_quantity' => $itemTotal['in'],
                'outward_quantity' => $itemTotal['out'],
                'closing_quantity' => $itemTotal['balance'],
                'voucher_details' => $voucherCollection,
            ];
        }
        // dd($result);

        return $result;
    }
    public function netStock(array $data): StockSummary
    {
        // Implement the logic to retrieve net stock
        return StockSummary::first(); // Example implementation
    }
    public function purchaseOrderOutstanding(): StockSummary
    {
        // Implement the logic to retrieve purchase order outstanding
        return StockSummary::first(); // Example implementation
    }
    public function salebleStock(): StockSummary
    {
        // Implement the logic to retrieve saleble stock
        return StockSummary::first(); // Example implementation
    }
    public function salesOrderOutstanding(): StockSummary
    {
        // Implement the logic to retrieve sales order outstanding
        return StockSummary::first(); // Example implementation
    }
}
