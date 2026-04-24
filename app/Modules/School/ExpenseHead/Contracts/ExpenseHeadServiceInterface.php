<?php

namespace App\Modules\School\ExpenseHead\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\ExpenseHead\Models\ExpenseHead;

interface ExpenseHeadServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?ExpenseHead;
    public function store(array $data): ExpenseHead;
    public function update(array $data, int $id): ExpenseHead;
    public function delete(int $id): bool;
}
