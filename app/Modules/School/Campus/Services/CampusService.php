<?php

namespace App\Modules\School\Campus\Services;

use App\Modules\School\Campus\Contracts\CampusServiceInterface;
use App\Modules\School\Campus\Models\Campus;
use Illuminate\Database\Eloquent\Collection;

class CampusService implements CampusServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Campus::with($this->resource)->get();
    }

    public function getById(int $id): ?Campus
    {
        return Campus::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Campus
    {
        return Campus::create($data);
    }

    public function update(array $data, int $id): Campus
    {
        $record = Campus::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Campus::findOrFail($id);
        return $record->delete();
    }
}
