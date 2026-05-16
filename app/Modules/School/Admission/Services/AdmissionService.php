<?php

namespace Modules\School\Admission\Services;

use Modules\School\Admission\Contracts\AdmissionServiceInterface;
use Modules\School\Admission\Facades\AdmissionRepoFacade as AdmissionRepository;
use Modules\School\Admission\Models\Admission;
use Illuminate\Database\Eloquent\Collection;

class AdmissionService implements AdmissionServiceInterface
{
    public function getAll(): Collection
    {
        return AdmissionRepository::all();
    }

    public function getById(int $id): ?Admission
    {
        return AdmissionRepository::find($id);
    }

    public function store(array $data): Admission
    {
        return AdmissionRepository::create($data);
    }

    public function update(array $data, int $id): Admission
    {
        return AdmissionRepository::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return AdmissionRepository::delete($id);
    }
}

