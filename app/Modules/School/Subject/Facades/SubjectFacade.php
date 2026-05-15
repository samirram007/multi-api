<?php
        namespace Modules\School\Subject\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Subject\Contracts\SubjectServiceInterface;
        class SubjectFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return SubjectServiceInterface::class;
            }
        }

        