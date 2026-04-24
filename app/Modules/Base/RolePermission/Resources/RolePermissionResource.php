<?php

namespace App\Modules\Base\RolePermission\Resources;

use App\Modules\Base\AppModuleFeature\Resources\AppModuleFeatureResource;
use App\Modules\Base\Role\Resources\RoleResource;
use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class RolePermissionResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'roleId' => $this->role_id,
            'appModuleFeatureId' => $this->app_module_feature_id,
            'isAllowed' => $this->is_allowed,
            'role' => RoleResource::make($this->whenLoaded('role')),
            'appModuleFeature' => AppModuleFeatureResource::make($this->whenLoaded('feature'))

        ];
    }
}
