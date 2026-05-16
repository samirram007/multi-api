<?php
namespace Modules\Aipt\DayBook\Facades;

use Modules\Aipt\DayBook\Contracts\DayBookRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class DayBookRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DayBookRepositoryInterface::class;
    }
}
