<?php
namespace Modules\Aipt\Holiday\Facades;

use Modules\Aipt\Holiday\Contracts\HolidayRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class HolidayRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HolidayRepositoryInterface::class;
    }
}
