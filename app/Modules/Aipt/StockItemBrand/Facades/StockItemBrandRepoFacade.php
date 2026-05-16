<?php
namespace Modules\Aipt\StockItemBrand\Facades;

use Modules\Aipt\StockItemBrand\Contracts\StockItemBrandRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockItemBrandRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemBrandRepositoryInterface::class;
    }
}
