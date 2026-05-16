<?php
namespace Modules\Base\Role\Facades;

use Modules\Base\Role\Contracts\RoleServiceInterface;
use Illuminate\Support\Facades\Facade;

class RoleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RoleServiceInterface::class;
    }
}
