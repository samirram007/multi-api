<?php

namespace App\Modules\School\ExaminationResult\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\ExaminationResult\Models\ExaminationResult;

interface ExaminationResultServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?ExaminationResult;
    public function store(array $data): ExaminationResult;
    public function update(array $data, int $id): ExaminationResult;
    public function delete(int $id): bool;
}
