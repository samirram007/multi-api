<?php
        namespace Modules\School\Fee\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Fee\Contracts\FeeServiceInterface;
        class FeeFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeServiceInterface::class;
            }
        }

        