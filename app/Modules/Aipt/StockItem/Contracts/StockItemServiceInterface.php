<?php

namespace Modules\Aipt\StockItem\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\StockItem\Models\StockItem;

interface StockItemServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?StockItem;
    public function store(array $data): StockItem;
    public function update(array $data, int $id): StockItem;
    public function delete(int $id): bool;
    public function getPurchasableStockItems(): Collection;
}
