<?php

namespace Modules\Aipt\DayBook\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\DayBook\Contracts\DayBookServiceInterface;

class DayBookFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return DayBookServiceInterface::class;
    }
}
