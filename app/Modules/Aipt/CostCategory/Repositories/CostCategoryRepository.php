<?php
namespace Modules\Aipt\CostCategory\Repositories;

use Modules\Aipt\CostCategory\Contracts\CostCategoryRepositoryInterface;
use Modules\Aipt\CostCategory\Models\CostCategory;
use App\Support\Repositories\BaseRepository;

class CostCategoryRepository extends BaseRepository implements CostCategoryRepositoryInterface
{
    public function __construct(CostCategory $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
