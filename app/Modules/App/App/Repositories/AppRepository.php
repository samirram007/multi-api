<?php

namespace Modules\App\App\Repositories;

use App\Support\Repositories\BaseRepository;
use Modules\App\App\Contracts\AppRepositoryInterface;
use Modules\App\App\Models\App;

class AppRepository extends BaseRepository implements AppRepositoryInterface
{
    public function __construct(App $model)
    {
        parent::__construct($model);
    }
}
