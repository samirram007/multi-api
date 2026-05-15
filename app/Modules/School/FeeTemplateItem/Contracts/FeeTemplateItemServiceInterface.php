<?php

namespace Modules\School\FeeTemplateItem\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\FeeTemplateItem\Models\FeeTemplateItem;

interface FeeTemplateItemServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?FeeTemplateItem;
    public function store(array $data): FeeTemplateItem;
    public function update(array $data, int $id): FeeTemplateItem;
    public function delete(int $id): bool;
}
