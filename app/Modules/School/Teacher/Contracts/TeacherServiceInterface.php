<?php

namespace App\Modules\School\Teacher\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\Teacher\Models\Teacher;

interface TeacherServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Teacher;
    public function store(array $data): Teacher;
    public function update(array $data, int $id): Teacher;
    public function delete(int $id): bool;
}
