<?php
namespace Modules\Base\CompanyType\Facades;

use Modules\Base\CompanyType\Contracts\CompanyTypeRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CompanyTypeRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CompanyTypeRepositoryInterface::class;
    }
}
