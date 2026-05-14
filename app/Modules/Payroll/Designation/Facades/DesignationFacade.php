<?php
        namespace Modules\Payroll\Designation\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\Payroll\Designation\Contracts\DesignationServiceInterface;
        class DesignationFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return DesignationServiceInterface::class;
            }
        }

        