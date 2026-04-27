<?php

namespace Modules\Payroll\Department\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Payroll\Department\Models\Department;

interface DepartmentServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Department;
    public function store(array $data): Department;
    public function update(array $data, int $id): Department;
    public function delete(int $id): bool;
}
