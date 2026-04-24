<?php
        namespace App\Modules\School\Teacher\Facades;
        use Illuminate\Support\Facades\Facade;
        class TeacherFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'teachers';
            }
        }

        