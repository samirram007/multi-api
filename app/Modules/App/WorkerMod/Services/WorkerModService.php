<?php

namespace App\Modules\WorkerMod\Services;

use App\Modules\WorkerMod\Contracts\WorkerModServiceInterface;
use App\Modules\WorkerMod\Models\WorkerMod;
use Illuminate\Database\Eloquent\Collection;

class WorkerModService implements WorkerModServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return WorkerMod::with($this->resource)->get();
    }

    public function getById(int $id): ?WorkerMod
    {
        return WorkerMod::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): WorkerMod
    {
        return WorkerMod::create($data);
    }

    public function update(array $data, int $id): WorkerMod
    {
        $record = WorkerMod::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = WorkerMod::findOrFail($id);
        return $record->delete();
    }
}
