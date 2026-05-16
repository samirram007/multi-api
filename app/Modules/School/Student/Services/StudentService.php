<?php

namespace Modules\School\Student\Services;

use Modules\School\Student\Contracts\StudentServiceInterface;
use Modules\School\Student\Facades\StudentRepoFacade as StudentRepository;
use Modules\School\Student\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentService implements StudentServiceInterface
{
    public function getAll(): Collection
    {
        return StudentRepository::all();
    }

    public function getById(int $id): ?Student
    {
        return StudentRepository::find($id);
    }

    public function store(array $data): Student
    {
        return StudentRepository::create($data);
    }

    public function update(array $data, int $id): Student
    {
        return StudentRepository::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return StudentRepository::delete($id);
    }
}
