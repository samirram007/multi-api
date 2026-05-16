<?php

namespace Modules\Base\CompanyType\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\CompanyType\Models\CompanyType;

interface CompanyTypeServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): CompanyType;
    public function store(array $data): CompanyType;
    public function update(array $data, int $id): CompanyType;
    public function delete(int $id): bool;
}
