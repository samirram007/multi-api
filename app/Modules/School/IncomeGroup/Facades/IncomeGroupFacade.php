<?php
        namespace App\Modules\School\IncomeGroup\Facades;
        use Illuminate\Support\Facades\Facade;
        class IncomeGroupFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'income_groups';
            }
        }

        