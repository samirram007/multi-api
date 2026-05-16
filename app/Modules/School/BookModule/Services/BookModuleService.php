<?php

namespace Modules\School\BookModule\Services;

use Modules\School\BookModule\Contracts\BookModuleServiceInterface;
use Modules\School\BookModule\Facades\BookModuleRepoFacade as BookModuleRepository;
use Modules\School\BookModule\Models\BookModule;
use Illuminate\Database\Eloquent\Collection;

class BookModuleService implements BookModuleServiceInterface
{
    public function getAll(): Collection
    {
        return BookModuleRepository::all();
    }

    public function getById(int $id): ?BookModule
    {
        return BookModuleRepository::find($id);
    }

    public function store(array $data): BookModule
    {
        return BookModuleRepository::create($data);
    }

    public function update(array $data, int $id): BookModule
    {
        return BookModuleRepository::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return BookModuleRepository::delete($id);
    }
}

