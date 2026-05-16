<?php

namespace Modules\School\BookChapter\Repositories;

use App\Support\Repositories\BaseRepository;
use Modules\School\BookChapter\Contracts\BookChapterRepositoryInterface;
use Modules\School\BookChapter\Models\BookChapter;

class BookChapterRepository extends BaseRepository implements BookChapterRepositoryInterface
{
    public function __construct(BookChapter $model)
    {
        parent::__construct($model, true);
    }
}
