<?php

namespace Modules\School\Fee\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Fee\Models\Fee;

interface FeeServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Fee;
    public function store(array $data): Fee;
    public function update(array $data, int $id): Fee;
    public function delete(int $id): bool;
}
