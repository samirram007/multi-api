<?php
namespace Modules\Aipt\StockSummary\Repositories;

use Modules\Aipt\StockSummary\Contracts\StockSummaryRepositoryInterface;
use Modules\Aipt\StockSummary\Models\StockSummary;
use App\Support\Repositories\BaseRepository;

class StockSummaryRepository extends BaseRepository implements StockSummaryRepositoryInterface
{
    public function __construct(StockSummary $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
