<?php

namespace App\Modules\School\AcademicStandard\Services;

use App\Modules\School\AcademicStandard\Contracts\AcademicStandardServiceInterface;
use App\Modules\School\AcademicStandard\Models\AcademicStandard;
use Illuminate\Database\Eloquent\Collection;

class AcademicStandardService implements AcademicStandardServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return AcademicStandard::with($this->resource)->get();
    }

    public function getById(int $id): ?AcademicStandard
    {
        return AcademicStandard::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): AcademicStandard
    {
        return AcademicStandard::create($data);
    }

    public function update(array $data, int $id): AcademicStandard
    {
        $record = AcademicStandard::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = AcademicStandard::findOrFail($id);
        return $record->delete();
    }
}
