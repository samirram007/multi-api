<?php

namespace Modules\Aipt\StorageUnit\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\StorageUnit\Models\StorageUnit;

interface StorageUnitServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?StorageUnit;
    public function store(array $data): StorageUnit;
    public function update(array $data, int $id): StorageUnit;
    public function delete(int $id): bool;
}
