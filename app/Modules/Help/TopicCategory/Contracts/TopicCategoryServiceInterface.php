<?php

namespace Modules\Help\TopicCategory\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Help\TopicCategory\Models\TopicCategory;

interface TopicCategoryServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?TopicCategory;
    public function getBySlug(string $id): ?TopicCategory;
    public function store(array $data): TopicCategory;
    public function update(array $data, int $id): TopicCategory;
    public function delete(int $id): bool;
}
