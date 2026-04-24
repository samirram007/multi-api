<?php

namespace App\Modules\School\Student\Services;

use App\Modules\School\Student\Contracts\StudentServiceInterface;
use App\Modules\School\Student\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentService implements StudentServiceInterface
{
    protected $resource = [];

    public function getAll(): Collection
    {
        return Student::with($this->resource)->get();
    }

    public function getById(int $id): ?Student
    {
        return Student::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Student
    {
        return Student::create($data);
    }

    public function update(array $data, int $id): Student
    {
        $record = Student::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Student::findOrFail($id);
        return $record->delete();
    }
}
