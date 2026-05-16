<?php
namespace Modules\Aipt\Distributor\Repositories;

use Modules\Aipt\Distributor\Contracts\DistributorRepositoryInterface;
use Modules\Aipt\Distributor\Models\Distributor;
use App\Support\Repositories\BaseRepository;

class DistributorRepository extends BaseRepository implements DistributorRepositoryInterface
{
    public function __construct(Distributor $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
