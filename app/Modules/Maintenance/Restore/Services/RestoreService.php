<?php

namespace App\Modules\Maintenance\Restore\Services;

use App\Modules\Maintenance\Restore\Contracts\RestoreServiceInterface;
use App\Modules\Maintenance\Restore\Models\Restore;
use Illuminate\Database\Eloquent\Collection;

class RestoreService implements RestoreServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Restore::with($this->resource)->get();
    }

    public function getById(int $id): ?Restore
    {
        return Restore::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Restore
    {
        return Restore::create($data);
    }

    public function update(array $data, int $id): Restore
    {
        $record = Restore::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Restore::findOrFail($id);
        return $record->delete();
    }
}
