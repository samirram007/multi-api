<?php
        namespace App\Modules\School\FeeTemplate\Facades;
        use Illuminate\Support\Facades\Facade;
        class FeeTemplateFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'fee_templates';
            }
        }

        