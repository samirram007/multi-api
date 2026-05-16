<?php
namespace Modules\Aipt\AccountNature\Facades;

use Modules\Aipt\AccountNature\Contracts\AccountNatureRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class AccountNatureRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AccountNatureRepositoryInterface::class;
    }
}
