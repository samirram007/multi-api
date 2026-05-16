<?php
namespace Modules\Aipt\DayBook\Facades;

use Modules\Aipt\DayBook\Contracts\DayBookServiceInterface;
use Illuminate\Support\Facades\Facade;

class DayBookFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DayBookServiceInterface::class;
    }
}
