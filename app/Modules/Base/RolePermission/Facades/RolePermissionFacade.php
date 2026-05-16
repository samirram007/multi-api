<?php
namespace Modules\Base\RolePermission\Facades;

use Modules\Base\RolePermission\Contracts\RolePermissionServiceInterface;
use Illuminate\Support\Facades\Facade;

class RolePermissionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RolePermissionServiceInterface::class;
    }
}
