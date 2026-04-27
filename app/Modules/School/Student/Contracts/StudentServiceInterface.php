<?php

namespace Modules\School\Student\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Student\Models\Student;

interface StudentServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Student;
    public function store(array $data): Student;
    public function update(array $data, int $id): Student;
    public function delete(int $id): bool;
}
