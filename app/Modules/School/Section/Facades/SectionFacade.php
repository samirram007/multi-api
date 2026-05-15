<?php
        namespace Modules\School\Section\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Section\Contracts\SectionServiceInterface;
        class SectionFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return SectionServiceInterface::class;
            }
        }

        