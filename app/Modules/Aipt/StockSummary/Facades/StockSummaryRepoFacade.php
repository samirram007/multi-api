<?php
namespace Modules\Aipt\StockSummary\Facades;

use Modules\Aipt\StockSummary\Contracts\StockSummaryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockSummaryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockSummaryRepositoryInterface::class;
    }
}
