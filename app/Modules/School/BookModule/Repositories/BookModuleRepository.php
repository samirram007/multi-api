<?php

namespace Modules\School\BookModule\Repositories;

use Modules\School\BookModule\Contracts\BookModuleRepositoryInterface;
use Modules\School\BookModule\Models\BookModule;
use App\Support\Repositories\BaseRepository;

class BookModuleRepository extends BaseRepository implements BookModuleRepositoryInterface
{
    public function __construct(BookModule $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
