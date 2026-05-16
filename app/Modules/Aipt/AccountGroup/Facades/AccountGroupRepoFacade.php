<?php
namespace Modules\Aipt\AccountGroup\Facades;

use Modules\Aipt\AccountGroup\Contracts\AccountGroupRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class AccountGroupRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AccountGroupRepositoryInterface::class;
    }
}
