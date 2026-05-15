<?php
        namespace Modules\School\ExaminationResult\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\ExaminationResult\Contracts\ExaminationResultServiceInterface;
        class ExaminationResultFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExaminationResultServiceInterface::class;
            }
        }

        