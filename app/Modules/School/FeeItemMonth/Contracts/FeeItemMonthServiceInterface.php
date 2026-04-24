<?php

namespace App\Modules\School\FeeItemMonth\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\FeeItemMonth\Models\FeeItemMonth;

interface FeeItemMonthServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeItemMonth;
    public function store(array $data): FeeItemMonth;
    public function update(array $data, int $id): FeeItemMonth;
    public function delete(int $id): bool;
}
