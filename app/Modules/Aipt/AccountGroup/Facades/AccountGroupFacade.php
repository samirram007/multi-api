<?php
namespace Modules\Aipt\AccountGroup\Facades;

use Modules\Aipt\AccountGroup\Contracts\AccountGroupServiceInterface;
use Illuminate\Support\Facades\Facade;

class AccountGroupFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AccountGroupServiceInterface::class;
    }
}
