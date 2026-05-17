<?php

namespace Modules\App\AliBaba\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\App\AliBaba\Models\AliBaba;

interface AliBabaServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?AliBaba;
    public function store(array $data): AliBaba;
    public function update(array $data, int $id): AliBaba;
    public function delete(int $id): bool;
}
