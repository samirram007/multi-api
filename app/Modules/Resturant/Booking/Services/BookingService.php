<?php

namespace App\Modules\Resturant\Booking\Services;

use App\Modules\Resturant\Booking\Contracts\BookingServiceInterface;
use App\Modules\Resturant\Booking\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

class BookingService implements BookingServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Booking::with($this->resource)->get();
    }

    public function getById(int $id): ?Booking
    {
        return Booking::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Booking
    {
        return Booking::create($data);
    }

    public function update(array $data, int $id): Booking
    {
        $record = Booking::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Booking::findOrFail($id);
        return $record->delete();
    }
}
