<?php

namespace Modules\School\Subject\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Subject\Models\Subject;

interface SubjectServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Subject;
    public function store(array $data): Subject;
    public function update(array $data, int $id): Subject;
    public function delete(int $id): bool;
}
