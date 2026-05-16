<?php

namespace Modules\School\AcademicSession\Services;

use Modules\School\AcademicSession\Contracts\AcademicSessionServiceInterface;
use Modules\School\AcademicSession\Models\AcademicSession;

use Illuminate\Database\Eloquent\Collection;

class AcademicSessionService implements AcademicSessionServiceInterface
{
    protected $resource = [];

    public function getAll(): Collection
    {
        return AcademicSessionRepoFacade::all();
    }

    public function getById(int $id): ?AcademicSession
    {
        return AcademicSessionRepository::find($id);
    }

    public function store(array $data): AcademicSession
    {
        return AcademicSessionRepository::create($data);
    }

    public function update(array $data, int $id): AcademicSession
    {
        return AcademicSessionRepository::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return AcademicSessionRepository::delete($id);
    }
}
