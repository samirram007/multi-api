<?php

namespace App\Modules\School\Examination\Services;

use App\Modules\School\Examination\Contracts\ExaminationServiceInterface;
use App\Modules\School\Examination\Models\Examination;
use Illuminate\Database\Eloquent\Collection;

class ExaminationService implements ExaminationServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Examination::with($this->resource)->get();
    }

    public function getById(int $id): ?Examination
    {
        return Examination::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Examination
    {
        return Examination::create($data);
    }

    public function update(array $data, int $id): Examination
    {
        $record = Examination::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Examination::findOrFail($id);
        return $record->delete();
    }
}
