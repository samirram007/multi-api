<?php

namespace Modules\School\FeeHead\Services;

use Modules\School\FeeHead\Contracts\FeeHeadServiceInterface;
use Modules\School\FeeHead\Models\FeeHead;
use Illuminate\Database\Eloquent\Collection;

class FeeHeadService implements FeeHeadServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeHead::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeHead
    {
        return FeeHead::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeHead
    {
        return FeeHead::create($data);
    }

    public function update(array $data, int $id): FeeHead
    {
        $record = FeeHead::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeHead::findOrFail($id);
        return $record->delete();
    }
}
