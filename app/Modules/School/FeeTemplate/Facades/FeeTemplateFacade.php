<?php
        namespace Modules\School\FeeTemplate\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeTemplate\Contracts\FeeTemplateServiceInterface;
        class FeeTemplateFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeTemplateServiceInterface::class;
            }
        }

        