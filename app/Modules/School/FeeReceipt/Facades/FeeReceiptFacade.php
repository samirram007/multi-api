<?php
        namespace Modules\School\FeeReceipt\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeReceipt\Contracts\FeeReceiptServiceInterface;
        class FeeReceiptFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeReceiptServiceInterface::class;
            }
        }

        