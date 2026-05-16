<?php
namespace Modules\Aipt\StockItem\Facades;

use Modules\Aipt\StockItem\Contracts\StockItemRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockItemRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemRepositoryInterface::class;
    }
}
