<?php

namespace Modules\App\Tenant\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\App\Tenant\Contracts\TenantRepositoryInterface;

class TenantRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TenantRepositoryInterface::class;
    }
}
