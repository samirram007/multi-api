<?php
namespace Modules\Aipt\StockGroup\Repositories;

use Modules\Aipt\StockGroup\Contracts\StockGroupRepositoryInterface;
use Modules\Aipt\StockGroup\Models\StockGroup;
use App\Support\Repositories\BaseRepository;

class StockGroupRepository extends BaseRepository implements StockGroupRepositoryInterface
{
    public function __construct(StockGroup $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
