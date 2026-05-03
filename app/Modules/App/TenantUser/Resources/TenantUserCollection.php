<?php

namespace Modules\App\TenantUser\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SuccessCollection;

class TenantUserCollection extends SuccessCollection
{

         /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
