<?php
        namespace Modules\Payroll\Employee\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\Payroll\Employee\Contracts\EmployeeServiceInterface;
        class EmployeeFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return EmployeeServiceInterface::class;
            }
        }

        