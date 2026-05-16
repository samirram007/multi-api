<?php
namespace Modules\Aipt\StockItemPrice\Facades;

use Modules\Aipt\StockItemPrice\Contracts\StockItemPriceServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockItemPriceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemPriceServiceInterface::class;
    }
}
