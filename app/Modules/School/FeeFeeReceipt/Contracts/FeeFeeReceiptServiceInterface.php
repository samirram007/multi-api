<?php

namespace Modules\School\FeeFeeReceipt\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\FeeFeeReceipt\Models\FeeFeeReceipt;

interface FeeFeeReceiptServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeFeeReceipt;
    public function store(array $data): FeeFeeReceipt;
    public function update(array $data, int $id): FeeFeeReceipt;
    public function delete(int $id): bool;
}
