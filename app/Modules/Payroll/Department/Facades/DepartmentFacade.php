<?php
        namespace App\Modules\Payroll\Department\Facades;
        use Illuminate\Support\Facades\Facade;
        class DepartmentFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'departments';
            }
        }

        