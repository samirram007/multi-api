<?php
        namespace App\Modules\School\ExaminationSchedule\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExaminationScheduleFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'examination_schedules';
            }
        }

        