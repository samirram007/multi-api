<?php
        namespace App\Modules\School\Building\Facades;
        use Illuminate\Support\Facades\Facade;
        class BuildingFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'buildings';
            }
        }

        