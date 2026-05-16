<?php

namespace Modules\School\Book\Services;

use Modules\School\Book\Contracts\BookServiceInterface;
use Modules\School\Book\Facades\BookRepoFacade as BookRepository;
use Modules\School\Book\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService implements BookServiceInterface
{
    public function getAll(): Collection
    {
        return BookRepository::all();
    }

    public function getById(int $id): ?Book
    {
        return BookRepository::find($id);
    }

    public function store(array $data): Book
    {
        return BookRepository::create($data);
    }

    public function update(array $data, int $id): Book
    {
        return BookRepository::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return BookRepository::delete($id);
    }
}

