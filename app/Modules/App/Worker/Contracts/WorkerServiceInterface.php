<?php

namespace App\Modules\Worker\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Worker\Models\Worker;

interface WorkerServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Worker;
    public function store(array $data): Worker;
    public function update(array $data, int $id): Worker;
    public function delete(int $id): bool;
}
