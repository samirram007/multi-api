<?php

namespace Modules\Aipt\StockJournalEntry\Services;

use Modules\Aipt\StockJournalEntry\Contracts\StockJournalEntryServiceInterface;
use Modules\Aipt\StockJournalEntry\Models\StockJournalEntry;
use Modules\Aipt\StockJournalStorageUnitEntry\Contracts\StockJournalStorageUnitEntryServiceInterface;
use Modules\Aipt\StockJournalStorageUnitEntry\Requests\StockJournalStorageUnitEntryRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class StockJournalEntryService implements StockJournalEntryServiceInterface
{
    protected $resource = ['rate_unit'];



    public function __construct(
        protected StockJournalStorageUnitEntryServiceInterface $stockJournalStorageUnitEntryService,
    ) {

    }
    public function getAll(): Collection
    {
        return StockJournalEntry::with($this->resource)->get();
    }

    public function getById(int $id): ?StockJournalEntry
    {
        return StockJournalEntry::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): StockJournalEntry
    {
        $stockJournalEntry = StockJournalEntry::create($data);
        if (!empty($data['stock_journal_storage_unit_entries'])) {
            foreach ($data['stock_journal_storage_unit_entries'] as $key => $entryData) {

                $entryData['stock_journal_entry_id'] = $stockJournalEntry->id;
                $rules = (new StockJournalStorageUnitEntryRequest())->rules();
                $validatedStockJournalStorageUnitEntry = Validator::make($entryData, $rules)->validate();
                // dump($validatedStockJournalStorageUnitEntry);
                $data['stock_journal_storage_unit_entries'][$key] = $this->stockJournalStorageUnitEntryService->store($validatedStockJournalStorageUnitEntry);
            }
        }
        return $stockJournalEntry;
    }

    public function update(array $data, int $id): StockJournalEntry
    {
        $record = StockJournalEntry::findOrFail($id);
        $record->update($data);

        if (!empty($data['stock_journal_storage_unit_entries'])) {
            $this->checkDelete($data['stock_journal_storage_unit_entries'], $record);

            $rules = (new StockJournalStorageUnitEntryRequest())->rules();

            foreach ($data['stock_journal_storage_unit_entries'] as $storage_unitData) {

                // dump($storage_unitData);
                //This is added because while updating stock journal entry storage_unit entries
                // need to have stock_journal_entry_id
                $storage_unitData['stock_journal_entry_id'] = $record->id;
                $validatedStorageUnitEntry = Validator::make(
                    $storage_unitData,
                    $rules
                )->validate();

                if (!empty($storage_unitData['id'])) {

                    $this->stockJournalStorageUnitEntryService->update(
                        $validatedStorageUnitEntry,
                        $storage_unitData['id']
                    );

                } else {
                    // dump($validatedStorageUnitEntry);
                    $this->stockJournalStorageUnitEntryService->store(
                        $validatedStorageUnitEntry
                    );
                }
            }
        }

        return $record->fresh();
    }

    public function getByStockJournalId(int $stockJournalId): Collection
    {
        return StockJournalEntry::with($this->resource)
            ->where('stock_journal_id', $stockJournalId)
            ->get();
    }

    public function delete(int $id): bool
    {
        $record = StockJournalEntry::findOrFail($id);
        return $record->delete();
    }

    private function checkDelete($data, $record)
    {
        $existingEntries = $this->stockJournalStorageUnitEntryService->getByStockJournalEntryId($record->id);
        foreach ($existingEntries as $existingEntry) {

            $found = false;

            foreach ($data as $entries) {
                if (
                    isset($entries['id']) &&
                    $entries['id'] == $existingEntry->id
                ) {
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $this->stockJournalStorageUnitEntryService->delete($existingEntry->id);
            }
        }
    }

}
