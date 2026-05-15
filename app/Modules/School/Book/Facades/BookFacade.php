<?php
        namespace Modules\School\Book\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Book\Contracts\BookServiceInterface;
        class BookFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return BookServiceInterface::class;
            }
        }

        