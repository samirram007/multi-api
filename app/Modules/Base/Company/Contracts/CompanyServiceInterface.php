<?php

namespace Modules\Base\Company\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Company\Models\Company;

interface CompanyServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Company;
    public function store(array $data): Company;
    public function update(array $data, int $id): Company;
    public function delete(int $id): bool;
}
