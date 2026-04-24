<?php

namespace App\Modules\School\FeeHead\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\FeeHead\Models\FeeHead;

interface FeeHeadServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeHead;
    public function store(array $data): FeeHead;
    public function update(array $data, int $id): FeeHead;
    public function delete(int $id): bool;
}
