<?php
namespace Modules\Aipt\StockItemBrand\Facades;

use Modules\Aipt\StockItemBrand\Contracts\StockItemBrandServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockItemBrandFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemBrandServiceInterface::class;
    }
}
