<?php
namespace Modules\Aipt\StockGroup\Facades;

use Modules\Aipt\StockGroup\Contracts\StockGroupServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockGroupFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockGroupServiceInterface::class;
    }
}
