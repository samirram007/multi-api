<?php

namespace App\Modules\School\AcademicSession\Services;

use App\Modules\School\AcademicSession\Contracts\AcademicSessionServiceInterface;
use App\Modules\School\AcademicSession\Models\AcademicSession;
use Illuminate\Database\Eloquent\Collection;

class AcademicSessionService implements AcademicSessionServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return AcademicSession::with($this->resource)->get();
    }

    public function getById(int $id): ?AcademicSession
    {
        return AcademicSession::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): AcademicSession
    {
        return AcademicSession::create($data);
    }

    public function update(array $data, int $id): AcademicSession
    {
        $record = AcademicSession::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = AcademicSession::findOrFail($id);
        return $record->delete();
    }
}
