<?php
namespace Modules\Aipt\StockItemBatch\Facades;

use Modules\Aipt\StockItemBatch\Contracts\StockItemBatchServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockItemBatchFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemBatchServiceInterface::class;
    }
}
