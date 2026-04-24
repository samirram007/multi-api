<?php
        namespace App\Modules\School\ExpenseHead\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExpenseHeadFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'expense_heads';
            }
        }

        