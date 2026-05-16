<?php
namespace Modules\Aipt\HsnSacCode\Repositories;

use Modules\Aipt\HsnSacCode\Contracts\HsnSacCodeRepositoryInterface;
use Modules\Aipt\HsnSacCode\Models\HsnSacCode;
use App\Support\Repositories\BaseRepository;

class HsnSacCodeRepository extends BaseRepository implements HsnSacCodeRepositoryInterface
{
    public function __construct(HsnSacCode $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
