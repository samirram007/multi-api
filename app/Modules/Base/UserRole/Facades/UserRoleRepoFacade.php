<?php
namespace Modules\Base\UserRole\Facades;

use Modules\Base\UserRole\Contracts\UserRoleRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class UserRoleRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserRoleRepositoryInterface::class;
    }
}
