<?php
namespace Modules\Base\State\Repositories;

use Modules\Base\State\Contracts\StateRepositoryInterface;
use Modules\Base\State\Models\State;
use App\Support\Repositories\BaseRepository;

class StateRepository extends BaseRepository implements StateRepositoryInterface
{
    public function __construct(State $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
