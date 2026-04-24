<?php

namespace App\Modules\School\EducationBoard\Services;

use App\Modules\School\EducationBoard\Contracts\EducationBoardServiceInterface;
use App\Modules\School\EducationBoard\Models\EducationBoard;
use Illuminate\Database\Eloquent\Collection;

class EducationBoardService implements EducationBoardServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return EducationBoard::with($this->resource)->get();
    }

    public function getById(int $id): ?EducationBoard
    {
        return EducationBoard::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): EducationBoard
    {
        return EducationBoard::create($data);
    }

    public function update(array $data, int $id): EducationBoard
    {
        $record = EducationBoard::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = EducationBoard::findOrFail($id);
        return $record->delete();
    }
}
