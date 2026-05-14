<?php

namespace Modules\Payroll\SalaryComponent\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Payroll\SalaryComponent\Contracts\SalaryComponentServiceInterface;

class SalaryComponentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SalaryComponentServiceInterface::class;
    }
}
