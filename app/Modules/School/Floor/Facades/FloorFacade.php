<?php
        namespace Modules\School\Floor\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Floor\Contracts\FloorServiceInterface;
        class FloorFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FloorServiceInterface::class;
            }
        }

        