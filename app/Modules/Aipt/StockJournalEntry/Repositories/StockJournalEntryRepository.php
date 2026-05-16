<?php
namespace Modules\Aipt\StockJournalEntry\Repositories;

use Modules\Aipt\StockJournalEntry\Contracts\StockJournalEntryRepositoryInterface;
use Modules\Aipt\StockJournalEntry\Models\StockJournalEntry;
use App\Support\Repositories\BaseRepository;

class StockJournalEntryRepository extends BaseRepository implements StockJournalEntryRepositoryInterface
{
    public function __construct(StockJournalEntry $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
