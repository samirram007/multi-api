<?php
        namespace App\Modules\Hospital\Doctor\Facades;
        use Illuminate\Support\Facades\Facade;
        class DoctorFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'doctors';
            }
        }

        