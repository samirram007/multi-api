<?php
namespace Modules\School\Admission\Facades;
use Modules\School\Admission\Contracts\AdmissionRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class AdmissionRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return AdmissionRepositoryInterface::class; }
}
