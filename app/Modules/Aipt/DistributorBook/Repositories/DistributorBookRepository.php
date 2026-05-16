<?php
namespace Modules\Aipt\DistributorBook\Repositories;

use Modules\Aipt\DistributorBook\Contracts\DistributorBookRepositoryInterface;
use Modules\Aipt\DistributorBook\Models\DistributorBook;
use App\Support\Repositories\BaseRepository;

class DistributorBookRepository extends BaseRepository implements DistributorBookRepositoryInterface
{
    public function __construct(DistributorBook $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
