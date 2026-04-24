<?php

namespace App\Modules\School\ExaminationSchedule\Services;

use App\Modules\School\ExaminationSchedule\Contracts\ExaminationScheduleServiceInterface;
use App\Modules\School\ExaminationSchedule\Models\ExaminationSchedule;
use Illuminate\Database\Eloquent\Collection;

class ExaminationScheduleService implements ExaminationScheduleServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return ExaminationSchedule::with($this->resource)->get();
    }

    public function getById(int $id): ?ExaminationSchedule
    {
        return ExaminationSchedule::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): ExaminationSchedule
    {
        return ExaminationSchedule::create($data);
    }

    public function update(array $data, int $id): ExaminationSchedule
    {
        $record = ExaminationSchedule::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = ExaminationSchedule::findOrFail($id);
        return $record->delete();
    }
}
