<?php

namespace Modules\App\TenantUser\Services;

use Modules\App\TenantUser\Contracts\TenantUserServiceInterface;
use Modules\App\TenantUser\Models\TenantUser;
use Illuminate\Database\Eloquent\Collection;

class TenantUserService implements TenantUserServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return TenantUser::with($this->resource)->get();
    }

    public function getById(int $id): ?TenantUser
    {
        return TenantUser::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): TenantUser
    {
        return TenantUser::create($data);
    }

    public function update(array $data, int $id): TenantUser
    {
        $record = TenantUser::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = TenantUser::findOrFail($id);
        return $record->delete();
    }
}
