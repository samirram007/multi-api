<?php
        namespace Modules\School\FeeHead\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeHead\Contracts\FeeHeadServiceInterface;
        class FeeHeadFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeHeadServiceInterface::class;
            }
        }

        