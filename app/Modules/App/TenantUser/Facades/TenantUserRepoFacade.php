<?php

namespace Modules\App\TenantUser\Facades;

use Modules\App\TenantUser\Contracts\TenantUserRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class TenantUserRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TenantUserRepositoryInterface::class;
    }
}
