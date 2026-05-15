<?php
        namespace Modules\School\Campus\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Campus\Contracts\CampusServiceInterface;
        class CampusFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return CampusServiceInterface::class;
            }
        }

        