<?php

namespace App\Modules\School\Building\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\Building\Models\Building;

interface BuildingServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Building;
    public function store(array $data): Building;
    public function update(array $data, int $id): Building;
    public function delete(int $id): bool;
}
