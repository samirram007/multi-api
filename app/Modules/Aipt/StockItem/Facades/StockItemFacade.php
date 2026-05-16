<?php
namespace Modules\Aipt\StockItem\Facades;

use Modules\Aipt\StockItem\Contracts\StockItemServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockItemFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemServiceInterface::class;
    }
}
