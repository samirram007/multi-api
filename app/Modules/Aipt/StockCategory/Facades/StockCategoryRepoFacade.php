<?php
namespace Modules\Aipt\StockCategory\Facades;

use Modules\Aipt\StockCategory\Contracts\StockCategoryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockCategoryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockCategoryRepositoryInterface::class;
    }
}
