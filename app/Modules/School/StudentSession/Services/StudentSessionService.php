<?php

namespace Modules\School\StudentSession\Services;

use Modules\School\StudentSession\Contracts\StudentSessionServiceInterface;
use Modules\School\StudentSession\Models\StudentSession;
use Illuminate\Database\Eloquent\Collection;

class StudentSessionService implements StudentSessionServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return StudentSession::with($this->resource)->get();
    }

    public function getById(int $id): ?StudentSession
    {
        return StudentSession::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): StudentSession
    {
        return StudentSession::create($data);
    }

    public function update(array $data, int $id): StudentSession
    {
        $record = StudentSession::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = StudentSession::findOrFail($id);
        return $record->delete();
    }
}
