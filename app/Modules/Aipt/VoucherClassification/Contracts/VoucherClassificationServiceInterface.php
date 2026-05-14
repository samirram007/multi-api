<?php

namespace Modules\Aipt\VoucherClassification\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\VoucherClassification\Models\VoucherClassification;

interface VoucherClassificationServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?VoucherClassification;
    public function store(array $data): VoucherClassification;
    public function update(array $data, int $id): VoucherClassification;
    public function delete(int $id): bool;
}
