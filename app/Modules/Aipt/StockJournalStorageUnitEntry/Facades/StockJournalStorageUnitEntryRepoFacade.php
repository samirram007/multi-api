<?php
namespace Modules\Aipt\StockJournalStorageUnitEntry\Facades;

use Modules\Aipt\StockJournalStorageUnitEntry\Contracts\StockJournalStorageUnitEntryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StockJournalStorageUnitEntryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockJournalStorageUnitEntryRepositoryInterface::class;
    }
}
