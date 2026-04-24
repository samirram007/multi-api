<?php

namespace App\Modules\Base\Country\Resources;

use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;

class CountryResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phoneCode' => $this->phone_code,
            'isoCode' => $this->iso_code,
            // 'states' => new StateCollection($this->whenLoaded('states')),

        ];
    }
}
