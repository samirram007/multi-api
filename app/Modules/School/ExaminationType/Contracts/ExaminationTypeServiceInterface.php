<?php

namespace App\Modules\School\ExaminationType\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\ExaminationType\Models\ExaminationType;

interface ExaminationTypeServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?ExaminationType;
    public function store(array $data): ExaminationType;
    public function update(array $data, int $id): ExaminationType;
    public function delete(int $id): bool;
}
