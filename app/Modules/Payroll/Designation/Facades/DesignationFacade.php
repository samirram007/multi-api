<?php
        namespace Modules\Payroll\Designation\Facades;
        use Illuminate\Support\Facades\Facade;
        class DesignationFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'designations';
            }
        }

        