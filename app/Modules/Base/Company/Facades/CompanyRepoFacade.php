<?php
namespace Modules\Base\Company\Facades;

use Modules\Base\Company\Contracts\CompanyRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CompanyRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CompanyRepositoryInterface::class;
    }
}
