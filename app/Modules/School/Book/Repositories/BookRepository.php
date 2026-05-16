<?php

namespace Modules\School\Book\Repositories;

use Modules\School\Book\Contracts\BookRepositoryInterface;
use Modules\School\Book\Models\Book;
use App\Support\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    public function __construct(Book $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
