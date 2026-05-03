<?php

namespace Modules\App\Tenant\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class TenantResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'AppModule' => $this->app_module,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'dbHost' => $this->db_host,
            'dbPort' => $this->db_port,
            'dbName' => $this->db_name,
            'dbUsername' => $this->db_username,
            'dbPassword' => $this->db_password,

            'createdAt' => $this->created_at?->toISO8601String(),
            'updatedAt' => $this->updated_at?->toISO8601String(),
        ];
    }
}

//  'name',
//         'code',
//         'app_module',
//         'description',
//         'status',
//         'db_host',
//         'db_port',
//         'db_name',
//         'db_username',
//         'db_password',
