<?php

namespace Modules\School\ExpenseItem\Services;

use Modules\School\ExpenseItem\Contracts\ExpenseItemServiceInterface;
use Modules\School\ExpenseItem\Models\ExpenseItem;
use Illuminate\Database\Eloquent\Collection;

class ExpenseItemService implements ExpenseItemServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return ExpenseItem::with($this->resource)->get();
    }

    public function getById(int $id): ?ExpenseItem
    {
        return ExpenseItem::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): ExpenseItem
    {
        return ExpenseItem::create($data);
    }

    public function update(array $data, int $id): ExpenseItem
    {
        $record = ExpenseItem::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = ExpenseItem::findOrFail($id);
        return $record->delete();
    }
}
