<?php

namespace Modules\School\ExpenseItem\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\ExpenseItem\Models\ExpenseItem;

interface ExpenseItemServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?ExpenseItem;
    public function store(array $data): ExpenseItem;
    public function update(array $data, int $id): ExpenseItem;
    public function delete(int $id): bool;
}
