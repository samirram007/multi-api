<?php
        namespace Modules\School\ExpenseHead\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\ExpenseHead\Contracts\ExpenseHeadServiceInterface;
        class ExpenseHeadFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExpenseHeadServiceInterface::class;
            }
        }

        