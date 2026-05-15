<?php

namespace Modules\School\BookChapter\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\BookChapter\Models\BookChapter;

interface BookChapterServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?BookChapter;
    public function store(array $data): BookChapter;
    public function update(array $data, int $id): BookChapter;
    public function delete(int $id): bool;
}
