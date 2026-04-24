<?php

namespace App\Modules\School\ExpenseGroup\Services;

use App\Modules\School\ExpenseGroup\Contracts\ExpenseGroupServiceInterface;
use App\Modules\School\ExpenseGroup\Models\ExpenseGroup;
use Illuminate\Database\Eloquent\Collection;

class ExpenseGroupService implements ExpenseGroupServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return ExpenseGroup::with($this->resource)->get();
    }

    public function getById(int $id): ?ExpenseGroup
    {
        return ExpenseGroup::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): ExpenseGroup
    {
        return ExpenseGroup::create($data);
    }

    public function update(array $data, int $id): ExpenseGroup
    {
        $record = ExpenseGroup::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = ExpenseGroup::findOrFail($id);
        return $record->delete();
    }
}
