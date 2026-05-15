<?php

namespace Modules\School\Month\Services;

use Modules\School\Month\Contracts\MonthServiceInterface;
use Modules\School\Month\Models\Month;
use Illuminate\Database\Eloquent\Collection;

class MonthService implements MonthServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Month::with($this->resource)->get();
    }

    public function getById(int $id): ?Month
    {
        return Month::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Month
    {
        return Month::create($data);
    }

    public function update(array $data, int $id): Month
    {
        $record = Month::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Month::findOrFail($id);
        return $record->delete();
    }
}
