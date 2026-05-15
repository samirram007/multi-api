<?php
        namespace Modules\School\AcademicStandard\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\AcademicStandard\Contracts\AcademicStandardServiceInterface;
        class AcademicStandardFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return AcademicStandardServiceInterface::class;
            }
        }

        