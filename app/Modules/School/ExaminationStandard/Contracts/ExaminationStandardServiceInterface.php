<?php

namespace App\Modules\School\ExaminationStandard\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\ExaminationStandard\Models\ExaminationStandard;

interface ExaminationStandardServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?ExaminationStandard;
    public function store(array $data): ExaminationStandard;
    public function update(array $data, int $id): ExaminationStandard;
    public function delete(int $id): bool;
}
