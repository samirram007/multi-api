<?php
        namespace App\Modules\School\AcademicStandard\Facades;
        use Illuminate\Support\Facades\Facade;
        class AcademicStandardFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'academic_standards';
            }
        }

        