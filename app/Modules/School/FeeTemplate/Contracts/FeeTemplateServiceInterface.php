<?php

namespace App\Modules\School\FeeTemplate\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\School\FeeTemplate\Models\FeeTemplate;

interface FeeTemplateServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeTemplate;
    public function store(array $data): FeeTemplate;
    public function update(array $data, int $id): FeeTemplate;
    public function delete(int $id): bool;
}
