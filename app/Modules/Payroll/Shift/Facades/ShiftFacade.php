<?php

namespace Modules\Payroll\Shift\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Payroll\Shift\Contracts\ShiftServiceInterface;

class ShiftFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ShiftServiceInterface::class;
    }
}
