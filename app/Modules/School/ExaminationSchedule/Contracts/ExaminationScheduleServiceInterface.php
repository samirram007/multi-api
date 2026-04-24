<?php

namespace App\Modules\School\ExaminationSchedule\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\ExaminationSchedule\Models\ExaminationSchedule;

interface ExaminationScheduleServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?ExaminationSchedule;
    public function store(array $data): ExaminationSchedule;
    public function update(array $data, int $id): ExaminationSchedule;
    public function delete(int $id): bool;
}
