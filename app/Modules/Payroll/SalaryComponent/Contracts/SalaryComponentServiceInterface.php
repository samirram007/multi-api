<?php

namespace Modules\Payroll\SalaryComponent\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Payroll\SalaryComponent\Models\SalaryComponent;

interface SalaryComponentServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?SalaryComponent;
    public function store(array $data): SalaryComponent;
    public function update(array $data, int $id): SalaryComponent;
    public function delete(int $id): bool;
}
