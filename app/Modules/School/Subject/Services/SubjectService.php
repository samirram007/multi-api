<?php

namespace Modules\School\Subject\Services;

use Modules\School\Subject\Contracts\SubjectServiceInterface;
use Modules\School\Subject\Models\Subject;
use Illuminate\Database\Eloquent\Collection;

class SubjectService implements SubjectServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Subject::with($this->resource)->get();
    }

    public function getById(int $id): ?Subject
    {
        return Subject::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Subject
    {
        return Subject::create($data);
    }

    public function update(array $data, int $id): Subject
    {
        $record = Subject::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Subject::findOrFail($id);
        return $record->delete();
    }
}
