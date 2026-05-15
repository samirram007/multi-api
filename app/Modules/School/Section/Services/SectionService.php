<?php

namespace Modules\School\Section\Services;

use Modules\School\Section\Contracts\SectionServiceInterface;
use Modules\School\Section\Models\Section;
use Illuminate\Database\Eloquent\Collection;

class SectionService implements SectionServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Section::with($this->resource)->get();
    }

    public function getById(int $id): ?Section
    {
        return Section::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Section
    {
        return Section::create($data);
    }

    public function update(array $data, int $id): Section
    {
        $record = Section::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Section::findOrFail($id);
        return $record->delete();
    }
}
