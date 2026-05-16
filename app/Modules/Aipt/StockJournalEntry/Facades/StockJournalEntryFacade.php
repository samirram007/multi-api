<?php
namespace Modules\Aipt\StockJournalEntry\Facades;

use Modules\Aipt\StockJournalEntry\Contracts\StockJournalEntryServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockJournalEntryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockJournalEntryServiceInterface::class;
    }
}
