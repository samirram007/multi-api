<?php

namespace Modules\Aipt\Voucher\Resources;

use App\Http\Resources\SuccessResource;
use Modules\Aipt\Company\Resources\CompanyResource;
use Modules\Aipt\FiscalYear\Resources\FiscalYearResource;
use Modules\Aipt\StockJournal\Resources\StockJournalResource;
use Modules\Aipt\VoucherEntry\Resources\VoucherEntryResource;
use Modules\Aipt\VoucherType\Resources\VoucherTypeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartyLedgerResource extends SuccessResource
{
    public function toArray(Request $request): array
    {

        $data = [
            'id' => $this['id'],
            'name' => $this['name'],
            'code' => $this['code'],
            'ledgerableId' => $this['ledgerable_id'],
            'ledgerableType' => $this['ledgerable_type'],
            'currentBalance' => $this['current_balance'],
        ];

        return $data;
    }
}
