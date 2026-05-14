<?php

namespace Modules\Aipt\StockUnit\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\StockUnit\Models\StockUnit;

interface StockUnitServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?StockUnit;
    public function store(array $data): StockUnit;
    public function update(array $data, int $id): StockUnit;
    public function delete(int $id): bool;
}
