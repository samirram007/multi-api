<?php

namespace Modules\School\Admission\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Admission\Models\Admission;

interface AdmissionServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Admission;
    public function store(array $data): Admission;
    public function update(array $data, int $id): Admission;
    public function delete(int $id): bool;
}
