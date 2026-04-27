<?php

namespace Modules\App\Menu\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\App\Menu\Models\Menu;

interface MenuServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Menu;
    public function store(array $data): Menu;
    public function update(array $data, int $id): Menu;
    public function delete(int $id): bool;
}
