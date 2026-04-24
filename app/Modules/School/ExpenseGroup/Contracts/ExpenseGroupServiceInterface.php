<?php

namespace App\Modules\School\ExpenseGroup\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\ExpenseGroup\Models\ExpenseGroup;

interface ExpenseGroupServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?ExpenseGroup;
    public function store(array $data): ExpenseGroup;
    public function update(array $data, int $id): ExpenseGroup;
    public function delete(int $id): bool;
}
