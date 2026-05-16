<?php
namespace Modules\Aipt\StockUnit\Facades;

use Modules\Aipt\StockUnit\Contracts\StockUnitRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockUnitRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockUnitRepositoryInterface::class;
    }
}
