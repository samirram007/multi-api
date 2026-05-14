<?php

namespace Modules\Payroll\Salary\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Payroll\Salary\Contracts\SalaryServiceInterface;

class SalaryFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SalaryServiceInterface::class;
    }
}
