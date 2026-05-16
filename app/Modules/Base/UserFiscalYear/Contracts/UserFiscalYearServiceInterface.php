<?php

namespace Modules\Base\UserFiscalYear\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\UserFiscalYear\Models\UserFiscalYear;

interface UserFiscalYearServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?UserFiscalYear;
    public function getByUserId(int $userId): ?UserFiscalYear;
    public function store(array $data): UserFiscalYear;
    public function saveReportingPeriod(array $data): UserFiscalYear;
    public function update(array $data, int $id): UserFiscalYear;
    public function delete(int $id): bool;
}
