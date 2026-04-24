<?php
        namespace App\Modules\School\Admission\Facades;
        use Illuminate\Support\Facades\Facade;
        class AdmissionFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'admissions';
            }
        }

        