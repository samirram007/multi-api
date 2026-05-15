<?php
        namespace Modules\School\StudentSession\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\StudentSession\Contracts\StudentSessionServiceInterface;
        class StudentSessionFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return StudentSessionServiceInterface::class;
            }
        }

        