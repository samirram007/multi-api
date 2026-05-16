<?php
namespace Modules\Base\RolePermission\Facades;

use Modules\Base\RolePermission\Contracts\RolePermissionRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class RolePermissionRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RolePermissionRepositoryInterface::class;
    }
}
