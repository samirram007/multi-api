<?php

namespace Modules\Aipt\StockItem\Services;

use Modules\Aipt\StockItem\Contracts\StockItemServiceInterface;
use Modules\Aipt\StockItem\Contracts\StockItemRepositoryInterface;
use Modules\Aipt\StockItem\Models\StockItem;
use Illuminate\Database\Eloquent\Collection;

class StockItemService implements StockItemServiceInterface
{
    protected array $resource = ['stock_unit', 'alternate_stock_unit'];

    public function __construct(protected StockItemRepositoryInterface $repository)
    {
    }

    public function getAll(): Collection
    {
        return $this->repository->with($this->resource)->all();
    }

    public function getById(int $id): ?StockItem
    {
        return $this->repository->with($this->resource)->find($id);
    }

    public function store(array $data): StockItem
    {
        return $this->repository->create($data);
    }

    public function update(array $data, int $id): StockItem
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function getPurchasableStockItems(): Collection
    {
        return $this->repository->with($this->resource)->all();
    }
}
