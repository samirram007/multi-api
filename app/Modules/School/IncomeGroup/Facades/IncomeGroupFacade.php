<?php
        namespace Modules\School\IncomeGroup\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\IncomeGroup\Contracts\IncomeGroupServiceInterface;
        class IncomeGroupFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return IncomeGroupServiceInterface::class;
            }
        }

        