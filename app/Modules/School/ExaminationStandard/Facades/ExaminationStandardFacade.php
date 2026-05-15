<?php
        namespace Modules\School\ExaminationStandard\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\ExaminationStandard\Contracts\ExaminationStandardServiceInterface;
        class ExaminationStandardFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExaminationStandardServiceInterface::class;
            }
        }

        