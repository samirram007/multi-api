<?php
        namespace Modules\School\FeeFeeReceipt\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeFeeReceipt\Contracts\FeeFeeReceiptServiceInterface;
        class FeeFeeReceiptFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeFeeReceiptServiceInterface::class;
            }
        }

        