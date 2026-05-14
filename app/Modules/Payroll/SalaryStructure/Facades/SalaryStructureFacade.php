<?php

namespace Modules\Payroll\SalaryStructure\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Payroll\SalaryStructure\Contracts\SalaryStructureServiceInterface;

class SalaryStructureFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SalaryStructureServiceInterface::class;
    }
}
