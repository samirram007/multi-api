<?php

namespace App\Modules\School\AcademicStandard\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\AcademicStandard\Models\AcademicStandard;

interface AcademicStandardServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?AcademicStandard;
    public function store(array $data): AcademicStandard;
    public function update(array $data, int $id): AcademicStandard;
    public function delete(int $id): bool;
}
