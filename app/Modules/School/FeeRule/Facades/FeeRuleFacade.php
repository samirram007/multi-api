<?php
        namespace Modules\School\FeeRule\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeRule\Contracts\FeeRuleServiceInterface;
        class FeeRuleFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeRuleServiceInterface::class;
            }
        }

        