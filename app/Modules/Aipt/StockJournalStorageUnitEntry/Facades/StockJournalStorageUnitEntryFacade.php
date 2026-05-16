<?php
namespace Modules\Aipt\StockJournalStorageUnitEntry\Facades;

use Modules\Aipt\StockJournalStorageUnitEntry\Contracts\StockJournalStorageUnitEntryServiceInterface;
use Illuminate\Support\Facades\Facade;

class StockJournalStorageUnitEntryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StockJournalStorageUnitEntryServiceInterface::class;
    }
}
