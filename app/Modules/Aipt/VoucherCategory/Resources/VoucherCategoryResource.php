<?php

namespace Modules\Aipt\VoucherCategory\Resources;

use Modules\Aipt\VoucherType\Resources\VoucherTypeCollection;
use Modules\Aipt\VoucherType\Resources\VoucherTypeResource;
use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class VoucherCategoryResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'moduleLink' => $this->module_link,
            'status' => $this->status,
            'voucherTypes' => VoucherTypeResource::collection($this->whenLoaded('voucher_types')),
        ];
    }
}
