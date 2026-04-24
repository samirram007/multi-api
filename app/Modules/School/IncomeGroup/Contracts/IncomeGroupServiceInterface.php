<?php

namespace App\Modules\School\IncomeGroup\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\IncomeGroup\Models\IncomeGroup;

interface IncomeGroupServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?IncomeGroup;
    public function store(array $data): IncomeGroup;
    public function update(array $data, int $id): IncomeGroup;
    public function delete(int $id): bool;
}
