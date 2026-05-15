<?php
        namespace Modules\School\FeeItem\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeItem\Contracts\FeeItemServiceInterface;
        class FeeItemFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeItemServiceInterface::class;
            }
        }

        