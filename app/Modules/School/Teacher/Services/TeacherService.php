<?php

namespace App\Modules\School\Teacher\Services;

use App\Modules\School\Teacher\Contracts\TeacherServiceInterface;
use App\Modules\School\Teacher\Models\Teacher;
use Illuminate\Database\Eloquent\Collection;

class TeacherService implements TeacherServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Teacher::with($this->resource)->get();
    }

    public function getById(int $id): ?Teacher
    {
        return Teacher::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Teacher
    {
        return Teacher::create($data);
    }

    public function update(array $data, int $id): Teacher
    {
        $record = Teacher::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Teacher::findOrFail($id);
        return $record->delete();
    }
}
