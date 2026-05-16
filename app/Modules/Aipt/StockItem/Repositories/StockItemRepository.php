<?php
namespace Modules\Aipt\StockItem\Repositories;

use Modules\Aipt\StockItem\Contracts\StockItemRepositoryInterface;
use Modules\Aipt\StockItem\Models\StockItem;
use App\Support\Repositories\BaseRepository;

class StockItemRepository extends BaseRepository implements StockItemRepositoryInterface
{
    public function __construct(StockItem $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
