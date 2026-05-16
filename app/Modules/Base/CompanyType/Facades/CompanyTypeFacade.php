<?php
namespace Modules\Base\CompanyType\Facades;

use Modules\Base\CompanyType\Contracts\CompanyTypeServiceInterface;
use Illuminate\Support\Facades\Facade;

class CompanyTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CompanyTypeServiceInterface::class;
    }
}
