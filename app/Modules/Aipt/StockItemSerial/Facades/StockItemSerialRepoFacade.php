<?php
namespace Modules\Aipt\StockItemSerial\Facades;

use Modules\Aipt\StockItemSerial\Contracts\StockItemSerialRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockItemSerialRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemSerialRepositoryInterface::class;
    }
}
