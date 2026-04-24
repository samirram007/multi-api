<?php
        namespace App\Modules\School\FeeHead\Facades;
        use Illuminate\Support\Facades\Facade;
        class FeeHeadFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'fee_heads';
            }
        }

        