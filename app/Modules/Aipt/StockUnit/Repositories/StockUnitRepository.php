<?php
namespace Modules\Aipt\StockUnit\Repositories;

use Modules\Aipt\StockUnit\Contracts\StockUnitRepositoryInterface;
use Modules\Aipt\StockUnit\Models\StockUnit;
use App\Support\Repositories\BaseRepository;

class StockUnitRepository extends BaseRepository implements StockUnitRepositoryInterface
{
    public function __construct(StockUnit $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
