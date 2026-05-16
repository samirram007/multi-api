<?php
namespace Modules\Aipt\Holiday\Facades;

use Modules\Aipt\Holiday\Contracts\HolidayServiceInterface;
use Illuminate\Support\Facades\Facade;

class HolidayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HolidayServiceInterface::class;
    }
}
