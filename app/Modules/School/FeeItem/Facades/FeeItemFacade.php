<?php
        namespace App\Modules\School\FeeItem\Facades;
        use Illuminate\Support\Facades\Facade;
        class FeeItemFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'fee_items';
            }
        }

        