<?php
namespace Modules\Aipt\StorageUnit\Repositories;

use Modules\Aipt\StorageUnit\Contracts\StorageUnitRepositoryInterface;
use Modules\Aipt\StorageUnit\Models\StorageUnit;
use App\Support\Repositories\BaseRepository;

class StorageUnitRepository extends BaseRepository implements StorageUnitRepositoryInterface
{
    public function __construct(StorageUnit $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
