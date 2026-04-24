<?php

namespace App\Modules\School\Campus\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\Campus\Models\Campus;

interface CampusServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Campus;
    public function store(array $data): Campus;
    public function update(array $data, int $id): Campus;
    public function delete(int $id): bool;
}
