<?php
        namespace Modules\School\BookModule\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\BookModule\Contracts\BookModuleServiceInterface;
        class BookModuleFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return BookModuleServiceInterface::class;
            }
        }

        