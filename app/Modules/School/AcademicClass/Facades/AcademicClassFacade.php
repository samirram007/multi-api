<?php
        namespace Modules\School\AcademicClass\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\AcademicClass\Contracts\AcademicClassServiceInterface;

        class AcademicClassFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return AcademicClassServiceInterface::class;
            }
        }

        