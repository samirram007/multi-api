<?php
namespace Modules\Aipt\StockCategory\Repositories;

use Modules\Aipt\StockCategory\Contracts\StockCategoryRepositoryInterface;
use Modules\Aipt\StockCategory\Models\StockCategory;
use App\Support\Repositories\BaseRepository;

class StockCategoryRepository extends BaseRepository implements StockCategoryRepositoryInterface
{
    public function __construct(StockCategory $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
