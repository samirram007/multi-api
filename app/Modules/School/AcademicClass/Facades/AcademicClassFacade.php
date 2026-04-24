<?php
        namespace App\Modules\School\AcademicClass\Facades;
        use Illuminate\Support\Facades\Facade;
        class AcademicClassFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'academic_classes';
            }
        }

        