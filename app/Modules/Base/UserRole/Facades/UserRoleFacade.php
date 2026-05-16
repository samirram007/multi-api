<?php
namespace Modules\Base\UserRole\Facades;

use Modules\Base\UserRole\Contracts\UserRoleServiceInterface;
use Illuminate\Support\Facades\Facade;

class UserRoleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserRoleServiceInterface::class;
    }
}
