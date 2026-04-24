<?php

namespace App\Modules\School\Examination\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\Examination\Models\Examination;

interface ExaminationServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Examination;
    public function store(array $data): Examination;
    public function update(array $data, int $id): Examination;
    public function delete(int $id): bool;
}
