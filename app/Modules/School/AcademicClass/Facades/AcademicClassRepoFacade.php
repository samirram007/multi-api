<?php
namespace Modules\School\AcademicClass\Facades;
use Modules\School\AcademicClass\Contracts\AcademicClassRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class AcademicClassRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return AcademicClassRepositoryInterface::class; }
}
