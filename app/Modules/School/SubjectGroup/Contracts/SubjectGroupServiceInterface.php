<?php

namespace Modules\School\SubjectGroup\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\SubjectGroup\Models\SubjectGroup;

interface SubjectGroupServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?SubjectGroup;
    public function store(array $data): SubjectGroup;
    public function update(array $data, int $id): SubjectGroup;
    public function delete(int $id): bool;
}
