<?php
        namespace Modules\School\FeeItemMonth\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeItemMonth\Contracts\FeeItemMonthServiceInterface;
        class FeeItemMonthFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeItemMonthServiceInterface::class;
            }
        }

        