<?php
namespace Modules\Base\UserFiscalYear\Facades;

use Modules\Base\UserFiscalYear\Contracts\UserFiscalYearServiceInterface;
use Illuminate\Support\Facades\Facade;

class UserFiscalYearFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserFiscalYearServiceInterface::class;
    }
}
