<?php
namespace Modules\Aipt\UniqueQuantityCode\Repositories;

use Modules\Aipt\UniqueQuantityCode\Contracts\UniqueQuantityCodeRepositoryInterface;
use Modules\Aipt\UniqueQuantityCode\Models\UniqueQuantityCode;
use App\Support\Repositories\BaseRepository;

class UniqueQuantityCodeRepository extends BaseRepository implements UniqueQuantityCodeRepositoryInterface
{
    public function __construct(UniqueQuantityCode $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
