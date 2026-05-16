<?php
namespace Modules\Aipt\StockItemBatch\Repositories;

use Modules\Aipt\StockItemBatch\Contracts\StockItemBatchRepositoryInterface;
use Modules\Aipt\StockItemBatch\Models\StockItemBatch;
use App\Support\Repositories\BaseRepository;

class StockItemBatchRepository extends BaseRepository implements StockItemBatchRepositoryInterface
{
    public function __construct(StockItemBatch $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
