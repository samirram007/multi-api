<?php

namespace Modules\School\AcademicStandard\Services;

use Modules\School\AcademicStandard\Contracts\AcademicStandardServiceInterface;
use Modules\School\AcademicStandard\Facades\AcademicStandardRepoFacade as AcademicStandardRepository;
use Modules\School\AcademicStandard\Models\AcademicStandard;
use Illuminate\Database\Eloquent\Collection;

class AcademicStandardService implements AcademicStandardServiceInterface
{
    public function getAll(): Collection
    {
        return AcademicStandardRepository::all();
    }

    public function getById(int $id): ?AcademicStandard
    {
        return AcademicStandardRepository::find($id);
    }

    public function store(array $data): AcademicStandard
    {
        return AcademicStandardRepository::create($data);
    }

    public function update(array $data, int $id): AcademicStandard
    {
        return AcademicStandardRepository::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return AcademicStandardRepository::delete($id);
    }
}

