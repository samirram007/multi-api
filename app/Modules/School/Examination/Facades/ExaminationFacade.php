<?php
        namespace Modules\School\Examination\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Examination\Contracts\ExaminationServiceInterface;
        class ExaminationFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExaminationServiceInterface::class;
            }
        }

        