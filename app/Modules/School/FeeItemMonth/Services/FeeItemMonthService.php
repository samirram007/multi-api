<?php

namespace App\Modules\School\FeeItemMonth\Services;

use App\Modules\School\FeeItemMonth\Contracts\FeeItemMonthServiceInterface;
use App\Modules\School\FeeItemMonth\Models\FeeItemMonth;
use Illuminate\Database\Eloquent\Collection;

class FeeItemMonthService implements FeeItemMonthServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeItemMonth::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeItemMonth
    {
        return FeeItemMonth::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeItemMonth
    {
        return FeeItemMonth::create($data);
    }

    public function update(array $data, int $id): FeeItemMonth
    {
        $record = FeeItemMonth::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeItemMonth::findOrFail($id);
        return $record->delete();
    }
}
