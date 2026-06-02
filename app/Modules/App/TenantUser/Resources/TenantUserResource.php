<?php

namespace Modules\App\TenantUser\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class TenantUserResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'userType' => $this->user_type,
            'status' => $this->status,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
