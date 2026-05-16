<?php

namespace Modules\School\AcademicStandard\Repositories;

use Modules\School\AcademicStandard\Contracts\AcademicStandardRepositoryInterface;
use Modules\School\AcademicStandard\Models\AcademicStandard;
use App\Support\Repositories\BaseRepository;

class AcademicStandardRepository extends BaseRepository implements AcademicStandardRepositoryInterface
{
    public function __construct(AcademicStandard $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
