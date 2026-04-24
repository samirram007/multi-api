<?php
        namespace App\Modules\School\FeeRule\Facades;
        use Illuminate\Support\Facades\Facade;
        class FeeRuleFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'fee_rules';
            }
        }

        