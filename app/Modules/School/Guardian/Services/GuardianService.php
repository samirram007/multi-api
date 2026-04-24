<?php

namespace App\Modules\School\Guardian\Services;

use App\Modules\School\Guardian\Contracts\GuardianServiceInterface;
use App\Modules\School\Guardian\Models\Guardian;
use Illuminate\Database\Eloquent\Collection;

class GuardianService implements GuardianServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Guardian::with($this->resource)->get();
    }

    public function getById(int $id): ?Guardian
    {
        return Guardian::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Guardian
    {
        return Guardian::create($data);
    }

    public function update(array $data, int $id): Guardian
    {
        $record = Guardian::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Guardian::findOrFail($id);
        return $record->delete();
    }
}
