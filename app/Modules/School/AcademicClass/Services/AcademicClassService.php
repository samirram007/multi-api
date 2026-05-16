<?php

namespace Modules\School\AcademicClass\Services;

use Modules\School\AcademicClass\Contracts\AcademicClassServiceInterface;
use Modules\School\AcademicClass\Facades\AcademicClassRepoFacade;
use Modules\School\AcademicClass\Models\AcademicClass;
use Illuminate\Database\Eloquent\Collection;

class AcademicClassService implements AcademicClassServiceInterface
{
    public function getAll(): Collection
    {
        return AcademicClassRepoFacade::all();
    }

    public function getById(int $id): ?AcademicClass
    {
        return AcademicClassRepoFacade::find($id);
    }

    public function store(array $data): AcademicClass
    {
        return AcademicClassRepoFacade::create($data);
    }

    public function update(array $data, int $id): AcademicClass
    {
        return AcademicClassRepoFacade::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return AcademicClassRepoFacade::delete($id);
    }
}
