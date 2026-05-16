<?php
namespace Modules\Aipt\StockJournalEntry\Facades;

use Modules\Aipt\StockJournalEntry\Contracts\StockJournalEntryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockJournalEntryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockJournalEntryRepositoryInterface::class;
    }
}
