<?php
namespace Modules\Aipt\StockSummary\Facades;

use Modules\Aipt\StockSummary\Contracts\StockSummaryServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockSummaryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockSummaryServiceInterface::class;
    }
}
