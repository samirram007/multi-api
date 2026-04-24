<?php

namespace App\Modules\Maintenance\Backup\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Maintenance\Backup\Models\Backup;

interface BackupServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Backup;
    public function store(array $data): Backup;
    public function update(array $data, int $id): Backup;
    public function delete(int $id): bool;
}
