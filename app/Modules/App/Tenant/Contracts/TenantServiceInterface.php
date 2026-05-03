<?php

namespace Modules\App\Tenant\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\App\Tenant\Models\Tenant;

interface TenantServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Tenant;
    public function store(array $data): Tenant;
    public function update(array $data, int $id): Tenant;
    public function delete(int $id): bool;
}
