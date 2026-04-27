<?php

namespace Modules\Base\Role\Resources;

use Modules\Base\RolePermission\Models\RolePermission;
use Modules\Base\RolePermission\Resources\RolePermissionResource;
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
