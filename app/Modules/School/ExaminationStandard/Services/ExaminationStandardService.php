<?php

namespace App\Modules\School\ExaminationStandard\Services;

use App\Modules\School\ExaminationStandard\Contracts\ExaminationStandardServiceInterface;
use App\Modules\School\ExaminationStandard\Models\ExaminationStandard;
use Illuminate\Database\Eloquent\Collection;

class ExaminationStandardService implements ExaminationStandardServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return ExaminationStandard::with($this->resource)->get();
    }

    public function getById(int $id): ?ExaminationStandard
    {
        return ExaminationStandard::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): ExaminationStandard
    {
        return ExaminationStandard::create($data);
    }

    public function update(array $data, int $id): ExaminationStandard
    {
        $record = ExaminationStandard::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = ExaminationStandard::findOrFail($id);
        return $record->delete();
    }
}
