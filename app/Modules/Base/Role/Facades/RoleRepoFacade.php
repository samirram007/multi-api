<?php
namespace Modules\Base\Role\Facades;

use Modules\Base\Role\Contracts\RoleRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class RoleRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RoleRepositoryInterface::class;
    }
}
