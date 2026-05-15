<?php

namespace Modules\School\FeeTemplateItem\Services;

use Modules\School\FeeTemplateItem\Contracts\FeeTemplateItemServiceInterface;
use Modules\School\FeeTemplateItem\Models\FeeTemplateItem;
use Illuminate\Database\Eloquent\Collection;

class FeeTemplateItemService implements FeeTemplateItemServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeTemplateItem::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeTemplateItem
    {
        return FeeTemplateItem::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeTemplateItem
    {
        return FeeTemplateItem::create($data);
    }

    public function update(array $data, int $id): FeeTemplateItem
    {
        $record = FeeTemplateItem::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeTemplateItem::findOrFail($id);
        return $record->delete();
    }
}
