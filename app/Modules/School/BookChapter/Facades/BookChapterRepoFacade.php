<?php

namespace Modules\School\BookChapter\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\School\BookChapter\Contracts\BookChapterRepositoryInterface;

class BookChapterRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BookChapterRepositoryInterface::class;
    }
}
