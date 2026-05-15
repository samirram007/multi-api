<?php
        namespace Modules\School\AcademicSession\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\AcademicSession\Contracts\AcademicSessionServiceInterface;
        class AcademicSessionFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return AcademicSessionServiceInterface::class;
            }
        }

        