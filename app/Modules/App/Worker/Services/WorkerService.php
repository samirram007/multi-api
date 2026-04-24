<?php

namespace App\Modules\Worker\Services;

use App\Modules\Worker\Contracts\WorkerServiceInterface;
use App\Modules\Worker\Models\Worker;
use Illuminate\Database\Eloquent\Collection;

class WorkerService implements WorkerServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Worker::with($this->resource)->get();
    }

    public function getById(int $id): ?Worker
    {
        return Worker::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Worker
    {
        return Worker::create($data);
    }

    public function update(array $data, int $id): Worker
    {
        $record = Worker::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Worker::findOrFail($id);
        return $record->delete();
    }
}
