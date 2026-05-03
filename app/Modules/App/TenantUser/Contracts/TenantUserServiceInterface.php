<?php

namespace Modules\App\TenantUser\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\App\TenantUser\Models\TenantUser;

interface TenantUserServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?TenantUser;
    public function store(array $data): TenantUser;
    public function update(array $data, int $id): TenantUser;
    public function delete(int $id): bool;
}
