<?php

namespace Modules\School\Book\Services;

use Modules\School\Book\Contracts\BookServiceInterface;
use Modules\School\Book\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService implements BookServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Book::with($this->resource)->get();
    }

    public function getById(int $id): ?Book
    {
        return Book::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Book
    {
        return Book::create($data);
    }

    public function update(array $data, int $id): Book
    {
        $record = Book::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Book::findOrFail($id);
        return $record->delete();
    }
}
