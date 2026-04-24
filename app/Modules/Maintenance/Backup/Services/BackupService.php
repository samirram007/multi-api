<?php

namespace App\Modules\Maintenance\Backup\Services;

use App\Modules\Maintenance\Backup\Contracts\BackupServiceInterface;
use App\Modules\Maintenance\Backup\Models\Backup;
use Illuminate\Database\Eloquent\Collection;

class BackupService implements BackupServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Backup::with($this->resource)->get();
    }

    public function getById(int $id): ?Backup
    {
        return Backup::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Backup
    {
        return Backup::create($data);
    }

    public function update(array $data, int $id): Backup
    {
        $record = Backup::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Backup::findOrFail($id);
        return $record->delete();
    }
}
