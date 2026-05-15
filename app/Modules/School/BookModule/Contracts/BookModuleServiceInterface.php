<?php

namespace Modules\School\BookModule\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\BookModule\Models\BookModule;

interface BookModuleServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?BookModule;
    public function store(array $data): BookModule;
    public function update(array $data, int $id): BookModule;
    public function delete(int $id): bool;
}
