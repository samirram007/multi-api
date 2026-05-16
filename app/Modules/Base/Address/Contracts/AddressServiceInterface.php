<?php

namespace Modules\Base\Address\Contracts;


use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Address\Models\Address;

interface AddressServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Address;
    public function store(array $data): Address;
    public function update(array $data, int $id): Address;
    public function delete(int $id): bool;
}
