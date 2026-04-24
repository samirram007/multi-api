<?php

namespace App\Modules\Hotel\Amenities\Services;

use App\Modules\Hotel\Amenities\Contracts\AmenitiesServiceInterface;
use App\Modules\Hotel\Amenities\Models\Amenities;
use Illuminate\Database\Eloquent\Collection;

class AmenitiesService implements AmenitiesServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Amenities::with($this->resource)->get();
    }

    public function getById(int $id): ?Amenities
    {
        return Amenities::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Amenities
    {
        return Amenities::create($data);
    }

    public function update(array $data, int $id): Amenities
    {
        $record = Amenities::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Amenities::findOrFail($id);
        return $record->delete();
    }
}
