<?php

namespace App\Modules\Base\CompanyType\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\CompanyType\Models\CompanyType;

interface CompanyTypeServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): CompanyType;
    public function store(array $data): CompanyType;
    public function update(array $data, int $id): CompanyType;
    public function delete(int $id): bool;
}
