<?php

namespace Modules\School\FeeItem\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\FeeItem\Models\FeeItem;

interface FeeItemServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeItem;
    public function store(array $data): FeeItem;
    public function update(array $data, int $id): FeeItem;
    public function delete(int $id): bool;
}
