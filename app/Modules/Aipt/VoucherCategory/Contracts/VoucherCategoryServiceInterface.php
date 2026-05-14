<?php

namespace Modules\Aipt\VoucherCategory\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\VoucherCategory\Models\VoucherCategory;

interface VoucherCategoryServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?VoucherCategory;
    public function store(array $data): VoucherCategory;
    public function update(array $data, int $id): VoucherCategory;
    public function delete(int $id): bool;
}
