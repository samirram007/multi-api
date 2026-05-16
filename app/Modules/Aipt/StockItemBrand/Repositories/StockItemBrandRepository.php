<?php
namespace Modules\Aipt\StockItemBrand\Repositories;

use Modules\Aipt\StockItemBrand\Contracts\StockItemBrandRepositoryInterface;
use Modules\Aipt\StockItemBrand\Models\StockItemBrand;
use App\Support\Repositories\BaseRepository;

class StockItemBrandRepository extends BaseRepository implements StockItemBrandRepositoryInterface
{
    public function __construct(StockItemBrand $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
