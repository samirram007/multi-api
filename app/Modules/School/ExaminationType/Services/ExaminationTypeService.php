<?php

namespace App\Modules\School\ExaminationType\Services;

use App\Modules\School\ExaminationType\Contracts\ExaminationTypeServiceInterface;
use App\Modules\School\ExaminationType\Models\ExaminationType;
use Illuminate\Database\Eloquent\Collection;

class ExaminationTypeService implements ExaminationTypeServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return ExaminationType::with($this->resource)->get();
    }

    public function getById(int $id): ?ExaminationType
    {
        return ExaminationType::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): ExaminationType
    {
        return ExaminationType::create($data);
    }

    public function update(array $data, int $id): ExaminationType
    {
        $record = ExaminationType::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = ExaminationType::findOrFail($id);
        return $record->delete();
    }
}
