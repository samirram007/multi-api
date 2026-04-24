<?php

namespace App\Modules\School\Building\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SuccessCollection;

class BuildingCollection extends SuccessCollection
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
