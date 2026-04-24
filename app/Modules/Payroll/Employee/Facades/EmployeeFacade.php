<?php
        namespace App\Modules\Payroll\Employee\Facades;
        use Illuminate\Support\Facades\Facade;
        class EmployeeFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'employees';
            }
        }

        