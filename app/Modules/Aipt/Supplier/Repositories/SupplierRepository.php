<?php
namespace Modules\Aipt\Supplier\Repositories;

use Modules\Aipt\Supplier\Contracts\SupplierRepositoryInterface;
use Modules\Aipt\Supplier\Models\Supplier;
use App\Support\Repositories\BaseRepository;

class SupplierRepository extends BaseRepository implements SupplierRepositoryInterface
{
    public function __construct(Supplier $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
