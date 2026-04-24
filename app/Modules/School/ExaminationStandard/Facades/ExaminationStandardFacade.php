<?php
        namespace App\Modules\School\ExaminationStandard\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExaminationStandardFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'examination_standards';
            }
        }

        