<?php

namespace App\Modules\Support\SLAPolicy\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Support\SLAPolicy\Models\SLAPolicy;

interface SLAPolicyServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?SLAPolicy;
    public function store(array $data): SLAPolicy;
    public function update(array $data, int $id): SLAPolicy;
    public function delete(int $id): bool;
}
