<?php

namespace Modules\Payroll\LeaveType\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Payroll\LeaveType\Contracts\LeaveTypeServiceInterface;

class LeaveTypeFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return  LeaveTypeServiceInterface::class;
    }
}
