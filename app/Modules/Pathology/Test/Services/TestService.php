<?php

namespace App\Modules\Pathology\Test\Services;

use App\Modules\Pathology\Test\Contracts\TestServiceInterface;
use App\Modules\Pathology\Test\Models\Test;
use Illuminate\Database\Eloquent\Collection;

class TestService implements TestServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Test::with($this->resource)->get();
    }

    public function getById(int $id): ?Test
    {
        return Test::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Test
    {
        return Test::create($data);
    }

    public function update(array $data, int $id): Test
    {
        $record = Test::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Test::findOrFail($id);
        return $record->delete();
    }
}
