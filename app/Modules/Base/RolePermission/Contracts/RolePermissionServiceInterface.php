<?php

namespace Modules\Base\RolePermission\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\RolePermission\Models\RolePermission;

interface RolePermissionServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?RolePermission;
    public function store(array $data): RolePermission;
    public function update(array $data, int $id): RolePermission;
    public function delete(int $id): bool;
}
