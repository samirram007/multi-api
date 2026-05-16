<?php
namespace Modules\Aipt\StockUnit\Facades;

use Modules\Aipt\StockUnit\Contracts\StockUnitServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockUnitFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockUnitServiceInterface::class;
    }
}
