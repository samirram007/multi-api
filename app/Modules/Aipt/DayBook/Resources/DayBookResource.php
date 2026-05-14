<?php

namespace Modules\Aipt\DayBook\Resources;

use Modules\Aipt\Voucher\Resources\VoucherResource;
use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class DayBookResource extends VoucherResource
{
    public function toArray(Request $request): array
    {
        return VoucherResource::toArray($request);
    }
}
