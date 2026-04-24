<?php

namespace App\Modules\School\ExaminationResult\Services;

use App\Modules\School\ExaminationResult\Contracts\ExaminationResultServiceInterface;
use App\Modules\School\ExaminationResult\Models\ExaminationResult;
use Illuminate\Database\Eloquent\Collection;

class ExaminationResultService implements ExaminationResultServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return ExaminationResult::with($this->resource)->get();
    }

    public function getById(int $id): ?ExaminationResult
    {
        return ExaminationResult::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): ExaminationResult
    {
        return ExaminationResult::create($data);
    }

    public function update(array $data, int $id): ExaminationResult
    {
        $record = ExaminationResult::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = ExaminationResult::findOrFail($id);
        return $record->delete();
    }
}
