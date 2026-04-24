<?php

namespace App\Modules\WorkerMod\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\WorkerMod\Models\WorkerMod;

interface WorkerModServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?WorkerMod;
    public function store(array $data): WorkerMod;
    public function update(array $data, int $id): WorkerMod;
    public function delete(int $id): bool;
}
