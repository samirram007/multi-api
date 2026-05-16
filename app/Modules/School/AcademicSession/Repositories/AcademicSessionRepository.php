<?php

namespace Modules\School\AcademicSession\Repositories;

use Modules\School\AcademicSession\Contracts\AcademicSessionRepositoryInterface;
use Modules\School\AcademicSession\Models\AcademicSession;
use App\Support\Repositories\BaseRepository;

class AcademicSessionRepository extends BaseRepository implements AcademicSessionRepositoryInterface
{
    public function __construct(AcademicSession $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
