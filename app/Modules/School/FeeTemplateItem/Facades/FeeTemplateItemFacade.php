<?php
        namespace Modules\School\FeeTemplateItem\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\FeeTemplateItem\Contracts\FeeTemplateItemServiceInterface;
        class FeeTemplateItemFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return FeeTemplateItemServiceInterface::class;
            }
        }

        