<?php

namespace App\Modules\School\FeeItem\Services;

use App\Modules\School\FeeItem\Contracts\FeeItemServiceInterface;
use App\Modules\School\FeeItem\Models\FeeItem;
use Illuminate\Database\Eloquent\Collection;

class FeeItemService implements FeeItemServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeItem::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeItem
    {
        return FeeItem::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeItem
    {
        return FeeItem::create($data);
    }

    public function update(array $data, int $id): FeeItem
    {
        $record = FeeItem::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeItem::findOrFail($id);
        return $record->delete();
    }
}
