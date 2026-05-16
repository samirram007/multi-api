<?php
namespace Modules\Aipt\StockJournalStorageUnitEntry\Repositories;

use Modules\Aipt\StockJournalStorageUnitEntry\Contracts\StockJournalStorageUnitEntryRepositoryInterface;
use Modules\Aipt\StockJournalStorageUnitEntry\Models\StockJournalStorageUnitEntry;
use App\Support\Repositories\BaseRepository;

class StockJournalStorageUnitEntryRepository extends BaseRepository implements StockJournalStorageUnitEntryRepositoryInterface
{
    public function __construct(StockJournalStorageUnitEntry $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
