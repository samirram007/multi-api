<?php
        namespace App\Modules\School\AcademicSession\Facades;
        use Illuminate\Support\Facades\Facade;
        class AcademicSessionFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'academic_sessions';
            }
        }

        