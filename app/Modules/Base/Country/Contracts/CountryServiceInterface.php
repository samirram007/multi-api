<?php

namespace App\Modules\Base\Country\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Country\Models\Country;

interface CountryServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Country;
    public function store(array $data): Country;
    public function update(array $data, int $id): Country;
    public function delete(int $id): bool;
}
