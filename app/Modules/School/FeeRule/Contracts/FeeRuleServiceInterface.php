<?php

namespace App\Modules\School\FeeRule\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\FeeRule\Models\FeeRule;

interface FeeRuleServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeRule;
    public function store(array $data): FeeRule;
    public function update(array $data, int $id): FeeRule;
    public function delete(int $id): bool;
}
