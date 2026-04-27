<?php

namespace Modules\School\Expense\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Expense\Models\Expense;

interface ExpenseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Expense;
    public function store(array $data): Expense;
    public function update(array $data, int $id): Expense;
    public function delete(int $id): bool;
}
