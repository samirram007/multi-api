<?php

namespace Modules\School\AcademicClass\Repositories;

use Modules\School\AcademicClass\Contracts\AcademicClassRepositoryInterface;
use Modules\School\AcademicClass\Models\AcademicClass;
use App\Support\Repositories\BaseRepository;

class AcademicClassRepository extends BaseRepository implements AcademicClassRepositoryInterface
{
    public function __construct(AcademicClass $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
