<?php

namespace Modules\School\Month\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Month\Models\Month;

interface MonthServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Month;
    public function store(array $data): Month;
    public function update(array $data, int $id): Month;
    public function delete(int $id): bool;
}
