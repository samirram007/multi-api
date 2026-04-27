<?php

namespace Modules\School\EducationBoard\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\EducationBoard\Models\EducationBoard;

interface EducationBoardServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?EducationBoard;
    public function store(array $data): EducationBoard;
    public function update(array $data, int $id): EducationBoard;
    public function delete(int $id): bool;
}
