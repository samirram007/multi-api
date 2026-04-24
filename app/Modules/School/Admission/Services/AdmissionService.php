<?php

namespace App\Modules\School\Admission\Services;

use App\Modules\School\Admission\Contracts\AdmissionServiceInterface;
use App\Modules\School\Admission\Models\Admission;
use Illuminate\Database\Eloquent\Collection;

class AdmissionService implements AdmissionServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Admission::with($this->resource)->get();
    }

    public function getById(int $id): ?Admission
    {
        return Admission::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Admission
    {
        return Admission::create($data);
    }

    public function update(array $data, int $id): Admission
    {
        $record = Admission::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Admission::findOrFail($id);
        return $record->delete();
    }
}
