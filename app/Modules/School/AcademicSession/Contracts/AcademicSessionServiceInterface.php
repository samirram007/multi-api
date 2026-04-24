<?php

namespace App\Modules\School\AcademicSession\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\AcademicSession\Models\AcademicSession;

interface AcademicSessionServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?AcademicSession;
    public function store(array $data): AcademicSession;
    public function update(array $data, int $id): AcademicSession;
    public function delete(int $id): bool;
}
