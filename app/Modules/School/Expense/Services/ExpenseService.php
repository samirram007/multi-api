<?php

namespace App\Modules\School\Expense\Services;

use App\Modules\School\Expense\Contracts\ExpenseServiceInterface;
use App\Modules\School\Expense\Models\Expense;
use Illuminate\Database\Eloquent\Collection;

class ExpenseService implements ExpenseServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Expense::with($this->resource)->get();
    }

    public function getById(int $id): ?Expense
    {
        return Expense::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Expense
    {
        return Expense::create($data);
    }

    public function update(array $data, int $id): Expense
    {
        $record = Expense::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Expense::findOrFail($id);
        return $record->delete();
    }
}
