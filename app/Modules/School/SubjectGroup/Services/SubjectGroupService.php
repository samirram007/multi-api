<?php

namespace Modules\School\SubjectGroup\Services;

use Modules\School\SubjectGroup\Contracts\SubjectGroupServiceInterface;
use Modules\School\SubjectGroup\Models\SubjectGroup;
use Illuminate\Database\Eloquent\Collection;

class SubjectGroupService implements SubjectGroupServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return SubjectGroup::with($this->resource)->get();
    }

    public function getById(int $id): ?SubjectGroup
    {
        return SubjectGroup::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): SubjectGroup
    {
        return SubjectGroup::create($data);
    }

    public function update(array $data, int $id): SubjectGroup
    {
        $record = SubjectGroup::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = SubjectGroup::findOrFail($id);
        return $record->delete();
    }
}
