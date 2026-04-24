<?php

namespace App\Modules\Base\Role\Resources;

use App\Modules\Base\RolePermission\Models\RolePermission;
use App\Modules\Base\RolePermission\Resources\RolePermissionResource;
use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class RoleResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status,
            'permissions' => RolePermissionResource::collection($this->whenLoaded('permissions')),
        ];
        return $data;
    }
}
