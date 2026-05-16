<?php
namespace Modules\Aipt\StockItemSerial\Facades;

use Modules\Aipt\StockItemSerial\Contracts\StockItemSerialServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockItemSerialFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockItemSerialServiceInterface::class;
    }
}
