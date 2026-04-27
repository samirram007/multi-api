<?php

namespace Modules\School\Guardian\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Guardian\Models\Guardian;

interface GuardianServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Guardian;
    public function store(array $data): Guardian;
    public function update(array $data, int $id): Guardian;
    public function delete(int $id): bool;
}
