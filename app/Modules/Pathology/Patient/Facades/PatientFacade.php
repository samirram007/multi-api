<?php
        namespace App\Modules\Pathology\Patient\Facades;
        use Illuminate\Support\Facades\Facade;
        class PatientFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'patients';
            }
        }

        