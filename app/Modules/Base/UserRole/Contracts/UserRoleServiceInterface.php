<?php

namespace Modules\Base\UserRole\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\UserRole\Models\UserRole;

interface UserRoleServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?UserRole;
    public function store(array $data): UserRole|bool|null;
    public function update(array $data, int $id): UserRole;
    public function delete(int $id): bool;
}
