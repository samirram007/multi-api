<?php

namespace Modules\School\Promotion\Services;

use Modules\School\Promotion\Contracts\PromotionServiceInterface;
use Modules\School\Promotion\Models\Promotion;
use Illuminate\Database\Eloquent\Collection;

class PromotionService implements PromotionServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Promotion::with($this->resource)->get();
    }

    public function getById(int $id): ?Promotion
    {
        return Promotion::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Promotion
    {
        return Promotion::create($data);
    }

    public function update(array $data, int $id): Promotion
    {
        $record = Promotion::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Promotion::findOrFail($id);
        return $record->delete();
    }
}
