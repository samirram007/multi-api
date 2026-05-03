<?php
namespace Modules\App\Tenant\Facades;
use Illuminate\Support\Facades\Facade;
use Modules\App\Tenant\Contracts\TenantServiceInterface;
class TenantFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TenantServiceInterface::class;
    }
}

