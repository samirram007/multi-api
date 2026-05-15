<?php

namespace Modules\School\StudentSession\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\StudentSession\Models\StudentSession;

interface StudentSessionServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?StudentSession;
    public function store(array $data): StudentSession;
    public function update(array $data, int $id): StudentSession;
    public function delete(int $id): bool;
}
