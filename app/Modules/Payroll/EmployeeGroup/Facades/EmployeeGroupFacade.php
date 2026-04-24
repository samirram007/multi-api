<?php
        namespace App\Modules\Payroll\EmployeeGroup\Facades;
        use Illuminate\Support\Facades\Facade;
        class EmployeeGroupFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'employee_groups';
            }
        }

        