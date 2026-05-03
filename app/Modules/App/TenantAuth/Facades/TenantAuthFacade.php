<?php
        namespace Modules\App\TenantAuth\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\App\TenantAuth\Contracts\TenantAuthServiceInterface;
        class TenantAuthFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return TenantAuthServiceInterface::class;
            }
        }

        