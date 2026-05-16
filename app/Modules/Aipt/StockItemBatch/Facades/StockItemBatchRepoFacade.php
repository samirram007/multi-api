<?php
namespace Modules\Aipt\StockItemBatch\Facades;

use Modules\Aipt\StockItemBatch\Contracts\StockItemBatchRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockItemBatchRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemBatchRepositoryInterface::class;
    }
}
