<?php

namespace App\Modules\Hotel\Amenities\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Hotel\Amenities\Models\Amenities;

interface AmenitiesServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Amenities;
    public function store(array $data): Amenities;
    public function update(array $data, int $id): Amenities;
    public function delete(int $id): bool;
}
