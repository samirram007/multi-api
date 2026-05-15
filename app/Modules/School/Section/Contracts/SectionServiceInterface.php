<?php

namespace Modules\School\Section\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Section\Models\Section;

interface SectionServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Section;
    public function store(array $data): Section;
    public function update(array $data, int $id): Section;
    public function delete(int $id): bool;
}
