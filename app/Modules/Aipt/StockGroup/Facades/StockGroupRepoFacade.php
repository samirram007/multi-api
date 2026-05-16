<?php
namespace Modules\Aipt\StockGroup\Facades;

use Modules\Aipt\StockGroup\Contracts\StockGroupRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockGroupRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockGroupRepositoryInterface::class;
    }
}
