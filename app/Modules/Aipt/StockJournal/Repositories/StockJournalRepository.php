<?php
namespace Modules\Aipt\StockJournal\Repositories;

use Modules\Aipt\StockJournal\Contracts\StockJournalRepositoryInterface;
use Modules\Aipt\StockJournal\Models\StockJournal;
use App\Support\Repositories\BaseRepository;

class StockJournalRepository extends BaseRepository implements StockJournalRepositoryInterface
{
    public function __construct(StockJournal $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
