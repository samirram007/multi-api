<?php

namespace App\Modules\Base\FiscalYear\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\FiscalYear\Models\FiscalYear;

interface FiscalYearServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FiscalYear;
    public function store(array $data): FiscalYear;
    public function update(array $data, int $id): FiscalYear;
    public function delete(int $id): bool;
}
