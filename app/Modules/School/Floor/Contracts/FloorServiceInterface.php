<?php

namespace App\Modules\School\Floor\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\Floor\Models\Floor;

interface FloorServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Floor;
    public function store(array $data): Floor;
    public function update(array $data, int $id): Floor;
    public function delete(int $id): bool;
}
