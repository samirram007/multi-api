<?php

namespace Modules\App\App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\App\App\Models\App;

interface AppServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?App;
    public function store(array $data): App;
    public function update(array $data, int $id): App;
    public function delete(int $id): bool;
}
