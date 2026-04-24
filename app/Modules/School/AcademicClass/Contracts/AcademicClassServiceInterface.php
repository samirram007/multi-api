<?php

namespace App\Modules\School\AcademicClass\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\AcademicClass\Models\AcademicClass;

interface AcademicClassServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?AcademicClass;
    public function store(array $data): AcademicClass;
    public function update(array $data, int $id): AcademicClass;
    public function delete(int $id): bool;
}
