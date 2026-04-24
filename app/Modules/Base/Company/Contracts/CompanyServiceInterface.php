<?php

namespace App\Modules\Base\Company\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Company\Models\Company;

interface CompanyServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Company;
    public function store(array $data): Company;
    public function update(array $data, int $id): Company;
    public function delete(int $id): bool;
}
