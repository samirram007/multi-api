<?php
        namespace App\Modules\School\Expense\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExpenseFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'expenses';
            }
        }

        