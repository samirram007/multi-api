<?php

namespace Modules\School\Admission\Repositories;

use Modules\School\Admission\Contracts\AdmissionRepositoryInterface;
use Modules\School\Admission\Models\Admission;
use App\Support\Repositories\BaseRepository;

class AdmissionRepository extends BaseRepository implements AdmissionRepositoryInterface
{
    public function __construct(Admission $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
