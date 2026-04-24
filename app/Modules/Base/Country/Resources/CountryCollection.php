<?php

namespace App\Modules\Base\Country\Resources;

use App\Http\Resources\SuccessCollection;
use Illuminate\Http\Request;


class CountryCollection extends SuccessCollection
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
