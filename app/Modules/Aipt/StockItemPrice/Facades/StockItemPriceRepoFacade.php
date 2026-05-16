<?php
namespace Modules\Aipt\StockItemPrice\Facades;

use Modules\Aipt\StockItemPrice\Contracts\StockItemPriceRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockItemPriceRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemPriceRepositoryInterface::class;
    }
}
