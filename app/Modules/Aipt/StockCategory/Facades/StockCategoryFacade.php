<?php
namespace Modules\Aipt\StockCategory\Facades;

use Modules\Aipt\StockCategory\Contracts\StockCategoryServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockCategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockCategoryServiceInterface::class;
    }
}
