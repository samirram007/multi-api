<?php
        namespace Modules\School\Month\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Month\Contracts\MonthServiceInterface;
        class MonthFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return MonthServiceInterface::class;
            }
        }

        