<?php
namespace Modules\Base\UserFiscalYear\Facades;

use Modules\Base\UserFiscalYear\Contracts\UserFiscalYearRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class UserFiscalYearRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserFiscalYearRepositoryInterface::class;
    }
}
