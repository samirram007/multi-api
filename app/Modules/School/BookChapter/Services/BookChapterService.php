<?php

namespace Modules\School\BookChapter\Services;

use Modules\School\BookChapter\Contracts\BookChapterServiceInterface;
use Modules\School\BookChapter\Models\BookChapter;
use Illuminate\Database\Eloquent\Collection;

class BookChapterService implements BookChapterServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return BookChapter::with($this->resource)->get();
    }

    public function getById(int $id): ?BookChapter
    {
        return BookChapter::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): BookChapter
    {
        return BookChapter::create($data);
    }

    public function update(array $data, int $id): BookChapter
    {
        $record = BookChapter::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = BookChapter::findOrFail($id);
        return $record->delete();
    }
}
