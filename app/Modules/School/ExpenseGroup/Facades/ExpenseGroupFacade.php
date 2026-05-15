<?php
        namespace Modules\School\ExpenseGroup\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\ExpenseGroup\Contracts\ExpenseGroupServiceInterface;
        class ExpenseGroupFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExpenseGroupServiceInterface::class;
            }
        }

        