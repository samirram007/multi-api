<?php

namespace App\Modules\Payroll\Designation\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Payroll\Designation\Models\Designation;

interface DesignationServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Designation;
    public function store(array $data): Designation;
    public function update(array $data, int $id): Designation;
    public function delete(int $id): bool;
}
