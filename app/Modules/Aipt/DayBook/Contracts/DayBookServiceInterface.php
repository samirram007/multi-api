<?php

namespace Modules\Aipt\DayBook\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Aipt\DayBook\Models\DayBook;

interface DayBookServiceInterface
{
    public function getAll(): Collection;
    public function dayBooksSelf(): Collection;

    public function getById(int $id): ?DayBook;
    public function store(array $data): DayBook;
    public function update(array $data, int $id): DayBook;
    public function delete(int $id): bool;
}
