<?php

namespace Modules\School\Student\Repositories;

use Modules\School\Student\Contracts\StudentRepositoryInterface;
use Modules\School\Student\Models\Student;
use App\Support\Repositories\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    public function __construct(Student $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
