<?php

namespace App\Modules\Pathology\Test\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Pathology\Test\Models\Test;

interface TestServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Test;
    public function store(array $data): Test;
    public function update(array $data, int $id): Test;
    public function delete(int $id): bool;
}
