<?php
        namespace Modules\School\BookChapter\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\BookChapter\Contracts\BookChapterServiceInterface;
        class BookChapterFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return BookChapterServiceInterface::class;
            }
        }

        