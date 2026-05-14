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

class TransactionLedgerResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        //dd($this);
        $data = [
            'id' => $this['id'],
            'name' => $this['name'],
            'code' => $this['code'],
            'accountGroupId' => $this['account_group_id'],
            'currentBalance' => $this['current_balance'],
        ];

        return $data;
    }
}
// function array_keys_to_camel_case(array $array): array
// {
//     return collect($array)->mapWithKeys(fn($value, $key) => [Str::camel($key) => $value])->all();
// }
