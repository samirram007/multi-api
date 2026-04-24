<?php

namespace App\Modules\School\FeeHead\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SuccessCollection;

class FeeHeadCollection extends SuccessCollection
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
