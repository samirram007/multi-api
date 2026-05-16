<?php

namespace Modules\Base\Country\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Country\Models\Country;

interface CountryServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Country;
    public function store(array $data): Country;
    public function update(array $data, int $id): Country;
    public function delete(int $id): bool;
}
