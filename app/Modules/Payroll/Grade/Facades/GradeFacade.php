<?php

namespace Modules\Payroll\Grade\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Payroll\Grade\Contracts\GradeServiceInterface;

class GradeFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return GradeServiceInterface::class;
    }
}
