<?php
namespace Modules\Aipt\CostCenter\Repositories;

use Modules\Aipt\CostCenter\Contracts\CostCenterRepositoryInterface;
use Modules\Aipt\CostCenter\Models\CostCenter;
use App\Support\Repositories\BaseRepository;

class CostCenterRepository extends BaseRepository implements CostCenterRepositoryInterface
{
    public function __construct(CostCenter $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
