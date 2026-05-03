<?php
        namespace Modules\App\TenantUser\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\App\TenantUser\Contracts\TenantUserServiceInterface;
        class TenantUserFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return TenantUserServiceInterface::class;
            }
        }

        