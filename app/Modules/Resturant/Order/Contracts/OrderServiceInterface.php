<?php

namespace App\Modules\Resturant\Order\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Resturant\Order\Models\Order;

interface OrderServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Order;
    public function store(array $data): Order;
    public function update(array $data, int $id): Order;
    public function delete(int $id): bool;
}
