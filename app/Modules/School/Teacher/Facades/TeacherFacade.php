<?php
        namespace Modules\School\Teacher\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Teacher\Contracts\TeacherServiceInterface;
        class TeacherFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return TeacherServiceInterface::class;
            }
        }

        