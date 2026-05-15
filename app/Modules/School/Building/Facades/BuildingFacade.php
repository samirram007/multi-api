<?php
        namespace Modules\School\Building\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Building\Contracts\BuildingServiceInterface;
        class BuildingFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return BuildingServiceInterface::class;
            }
        }

        