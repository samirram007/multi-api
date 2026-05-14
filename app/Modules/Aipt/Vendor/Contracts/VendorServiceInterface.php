<?php

namespace Modules\Aipt\Vendor\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\Vendor\Models\Vendor;

interface VendorServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Vendor;
    public function store(array $data): Vendor;
    public function update(array $data, int $id): Vendor;
    public function delete(int $id): bool;
}
