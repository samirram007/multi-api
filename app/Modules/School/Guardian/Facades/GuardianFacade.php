<?php
        namespace Modules\School\Guardian\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Guardian\Contracts\GuardianServiceInterface;
        class GuardianFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return GuardianServiceInterface::class;
            }
        }

        