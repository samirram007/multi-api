<?php

namespace Modules\School\BookModule\Services;

use Modules\School\BookModule\Contracts\BookModuleServiceInterface;
use Modules\School\BookModule\Models\BookModule;
use Illuminate\Database\Eloquent\Collection;

class BookModuleService implements BookModuleServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return BookModule::with($this->resource)->get();
    }

    public function getById(int $id): ?BookModule
    {
        return BookModule::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): BookModule
    {
        return BookModule::create($data);
    }

    public function update(array $data, int $id): BookModule
    {
        $record = BookModule::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = BookModule::findOrFail($id);
        return $record->delete();
    }
}
