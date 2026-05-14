<?php

namespace Modules\Aipt\Holiday\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\Holiday\Contracts\HolidayServiceInterface;

class HolidayFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return HolidayServiceInterface::class;
    }
}
