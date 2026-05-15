<?php

namespace Modules\School\Book\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\School\Book\Models\Book;

interface BookServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Book;
    public function store(array $data): Book;
    public function update(array $data, int $id): Book;
    public function delete(int $id): bool;
}
