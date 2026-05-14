<?php
namespace Modules\Aipt\AccountGroup\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\AccountGroup\Contracts\AccountGroupServiceInterface;
class AccountGroupFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AccountGroupServiceInterface::class;
    }
}
