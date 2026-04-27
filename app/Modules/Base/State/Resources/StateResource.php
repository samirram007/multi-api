<?php

namespace Modules\Base\State\Resources;

use App\Http\Resources\SuccessResource;


use Modules\Base\Country\Resources\CountryResource;
use Illuminate\Http\Request;


class StateResource extends SuccessResource
{
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'gstCode' => $this->gst_code,
            'countryId' => $this->country_id,
            'country' => CountryResource::make($this->whenLoaded('country')),


        ];
    }
}
