<?php
        namespace Modules\School\Promotion\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Promotion\Contracts\PromotionServiceInterface;
        class PromotionFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return PromotionServiceInterface::class;
            }
        }

        