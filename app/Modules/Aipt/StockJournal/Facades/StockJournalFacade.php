<?php
namespace Modules\Aipt\StockJournal\Facades;

use Modules\Aipt\StockJournal\Contracts\StockJournalServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockJournalFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockJournalServiceInterface::class;
    }
}
