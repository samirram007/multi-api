<?php
namespace Modules\Aipt\StockJournal\Facades;

use Modules\Aipt\StockJournal\Contracts\StockJournalRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockJournalRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockJournalRepositoryInterface::class;
    }
}
