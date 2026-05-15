<?php
        namespace Modules\School\Expense\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Expense\Contracts\ExpenseServiceInterface;
        class ExpenseFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExpenseServiceInterface::class;
            }
        }

        