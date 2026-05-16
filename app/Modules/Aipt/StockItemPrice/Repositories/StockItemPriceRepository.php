<?php
namespace Modules\Aipt\StockItemPrice\Repositories;

use Modules\Aipt\StockItemPrice\Contracts\StockItemPriceRepositoryInterface;
use Modules\Aipt\StockItemPrice\Models\StockItemPrice;
use App\Support\Repositories\BaseRepository;

class StockItemPriceRepository extends BaseRepository implements StockItemPriceRepositoryInterface
{
    public function __construct(StockItemPrice $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
