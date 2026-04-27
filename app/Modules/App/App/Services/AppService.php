<?php

namespace Modules\App\App\Services;

use Modules\App\App\Contracts\AppServiceInterface;
use Modules\App\App\Models\App;
use Illuminate\Database\Eloquent\Collection;

class AppService implements AppServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return App::with($this->resource)->get();
    }

    public function getById(int $id): ?App
    {
        return App::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): App
    {
        return App::create($data);
    }

    public function update(array $data, int $id): App
    {
        $record = App::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = App::findOrFail($id);
        return $record->delete();
    }
}
