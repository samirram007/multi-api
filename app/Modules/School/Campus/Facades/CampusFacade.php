<?php
        namespace App\Modules\School\Campus\Facades;
        use Illuminate\Support\Facades\Facade;
        class CampusFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'campuses';
            }
        }

        