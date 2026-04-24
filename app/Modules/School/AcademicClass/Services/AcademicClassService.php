<?php

namespace App\Modules\School\AcademicClass\Services;

use App\Modules\School\AcademicClass\Contracts\AcademicClassServiceInterface;
use App\Modules\School\AcademicClass\Models\AcademicClass;
use Illuminate\Database\Eloquent\Collection;

class AcademicClassService implements AcademicClassServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return AcademicClass::with($this->resource)->get();
    }

    public function getById(int $id): ?AcademicClass
    {
        return AcademicClass::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): AcademicClass
    {
        return AcademicClass::create($data);
    }

    public function update(array $data, int $id): AcademicClass
    {
        $record = AcademicClass::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = AcademicClass::findOrFail($id);
        return $record->delete();
    }
}
