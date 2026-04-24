<?php
        namespace App\Modules\School\Floor\Facades;
        use Illuminate\Support\Facades\Facade;
        class FloorFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'floors';
            }
        }

        