<?php

namespace Modules\School\FeeReceipt\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\FeeReceipt\Models\FeeReceipt;

interface FeeReceiptServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeReceipt;
    public function store(array $data): FeeReceipt;
    public function update(array $data, int $id): FeeReceipt;
    public function delete(int $id): bool;
}
