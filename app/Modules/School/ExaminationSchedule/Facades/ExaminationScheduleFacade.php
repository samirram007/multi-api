<?php
        namespace Modules\School\ExaminationSchedule\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\ExaminationSchedule\Contracts\ExaminationScheduleServiceInterface;
        class ExaminationScheduleFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExaminationScheduleServiceInterface::class;
            }
        }

        