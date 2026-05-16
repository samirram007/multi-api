<?php
namespace Modules\School\AcademicStandard\Facades;
use Modules\School\AcademicStandard\Contracts\AcademicStandardRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class AcademicStandardRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return AcademicStandardRepositoryInterface::class; }
}
