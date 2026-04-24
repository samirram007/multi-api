<?php
        namespace App\Modules\School\Guardian\Facades;
        use Illuminate\Support\Facades\Facade;
        class GuardianFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'guardians';
            }
        }

        