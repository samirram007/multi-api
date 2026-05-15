<?php
namespace Modules\School\Student\Facades;
use Illuminate\Support\Facades\Facade;
use Modules\School\Student\Contracts\StudentServiceInterface;

class StudentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StudentServiceInterface::class;
    }
}
