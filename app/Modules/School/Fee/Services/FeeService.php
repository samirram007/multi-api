<?php

namespace App\Modules\School\Fee\Services;

use App\Modules\School\Fee\Contracts\FeeServiceInterface;
use App\Modules\School\Fee\Models\Fee;
use Illuminate\Database\Eloquent\Collection;

class FeeService implements FeeServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Fee::with($this->resource)->get();
    }

    public function getById(int $id): ?Fee
    {
        return Fee::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Fee
    {
        return Fee::create($data);
    }

    public function update(array $data, int $id): Fee
    {
        $record = Fee::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Fee::findOrFail($id);
        return $record->delete();
    }
}
