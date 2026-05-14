<?php
        namespace Modules\Payroll\EmployeeGroup\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\Payroll\EmployeeGroup\Contracts\EmployeeGroupServiceInterface;
        class EmployeeGroupFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return EmployeeGroupServiceInterface::class;
            }
        }

        