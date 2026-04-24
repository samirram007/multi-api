<?php
        namespace App\Modules\Hospital\Patient\Facades;
        use Illuminate\Support\Facades\Facade;
        class PatientFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'patients';
            }
        }

        