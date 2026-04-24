<?php
        namespace App\Modules\School\ExpenseGroup\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExpenseGroupFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'expense_groups';
            }
        }

        