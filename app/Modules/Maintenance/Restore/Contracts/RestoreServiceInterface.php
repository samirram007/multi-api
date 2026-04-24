<?php

namespace App\Modules\Maintenance\Restore\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Maintenance\Restore\Models\Restore;

interface RestoreServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Restore;
    public function store(array $data): Restore;
    public function update(array $data, int $id): Restore;
    public function delete(int $id): bool;
}
