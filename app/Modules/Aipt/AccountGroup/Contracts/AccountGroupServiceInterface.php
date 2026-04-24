<?php

namespace App\Modules\Aipt\AccountGroup\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Aipt\AccountGroup\Models\AccountGroup;

interface AccountGroupServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?AccountGroup;
    public function store(array $data): AccountGroup;
    public function update(array $data, int $id): AccountGroup;
    public function delete(int $id): bool;
    public function getCurrentLiabilityGroups(): Collection;
}
