<?php

namespace App\Modules\Resturant\Booking\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Resturant\Booking\Models\Booking;

interface BookingServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Booking;
    public function store(array $data): Booking;
    public function update(array $data, int $id): Booking;
    public function delete(int $id): bool;
}
