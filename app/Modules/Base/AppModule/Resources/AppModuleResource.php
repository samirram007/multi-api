<?php

namespace App\Modules\Base\AppModule\Resources;


use App\Modules\Base\AppModuleFeature\Resources\AppModuleFeatureResource;
use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class AppModuleResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status,
            'description' => $this->description,
            'features' => AppModuleFeatureResource::collection($this->whenLoaded('app_module_features')),
        ];
    }
}
