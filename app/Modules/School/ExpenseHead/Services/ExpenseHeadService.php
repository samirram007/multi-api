<?php

namespace App\Modules\School\ExpenseHead\Services;

use App\Modules\School\ExpenseHead\Contracts\ExpenseHeadServiceInterface;
use App\Modules\School\ExpenseHead\Models\ExpenseHead;
use Illuminate\Database\Eloquent\Collection;

class ExpenseHeadService implements ExpenseHeadServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return ExpenseHead::with($this->resource)->get();
    }

    public function getById(int $id): ?ExpenseHead
    {
        return ExpenseHead::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): ExpenseHead
    {
        return ExpenseHead::create($data);
    }

    public function update(array $data, int $id): ExpenseHead
    {
        $record = ExpenseHead::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = ExpenseHead::findOrFail($id);
        return $record->delete();
    }
}
