<?php

namespace App\Modules\School\IncomeGroup\Services;

use App\Modules\School\IncomeGroup\Contracts\IncomeGroupServiceInterface;
use App\Modules\School\IncomeGroup\Models\IncomeGroup;
use Illuminate\Database\Eloquent\Collection;

class IncomeGroupService implements IncomeGroupServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return IncomeGroup::with($this->resource)->get();
    }

    public function getById(int $id): ?IncomeGroup
    {
        return IncomeGroup::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): IncomeGroup
    {
        return IncomeGroup::create($data);
    }

    public function update(array $data, int $id): IncomeGroup
    {
        $record = IncomeGroup::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = IncomeGroup::findOrFail($id);
        return $record->delete();
    }
}
