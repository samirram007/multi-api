<?php

namespace Modules\Aipt\VoucherParty\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\VoucherParty\Models\VoucherParty;

interface VoucherPartyServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?VoucherParty;
    public function store(array $data): VoucherParty;
    public function update(array $data, int $id): VoucherParty;
    public function delete(int $id): bool;
}
