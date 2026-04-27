<?php

namespace Modules\Resturant\Order\Services;

use Modules\Resturant\Order\Contracts\OrderServiceInterface;
use Modules\Resturant\Order\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderService implements OrderServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Order::with($this->resource)->get();
    }

    public function getById(int $id): ?Order
    {
        return Order::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Order
    {
        return Order::create($data);
    }

    public function update(array $data, int $id): Order
    {
        $record = Order::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Order::findOrFail($id);
        return $record->delete();
    }
}
