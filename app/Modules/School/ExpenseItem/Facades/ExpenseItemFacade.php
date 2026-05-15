<?php
        namespace Modules\School\ExpenseItem\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\ExpenseItem\Contracts\ExpenseItemServiceInterface;
        class ExpenseItemFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExpenseItemServiceInterface::class;
            }
        }

        