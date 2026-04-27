<?php

namespace Modules\App\Menu\Services;

use Modules\App\Menu\Contracts\MenuServiceInterface;
use Modules\App\Menu\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

class MenuService implements MenuServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Menu::with($this->resource)->get();
    }

    public function getById(int $id): ?Menu
    {
        return Menu::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Menu
    {
        return Menu::create($data);
    }

    public function update(array $data, int $id): Menu
    {
        $record = Menu::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Menu::findOrFail($id);
        return $record->delete();
    }
}
