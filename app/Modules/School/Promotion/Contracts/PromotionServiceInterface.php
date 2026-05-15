<?php

namespace Modules\School\Promotion\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Promotion\Models\Promotion;

interface PromotionServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Promotion;
    public function store(array $data): Promotion;
    public function update(array $data, int $id): Promotion;
    public function delete(int $id): bool;
}
