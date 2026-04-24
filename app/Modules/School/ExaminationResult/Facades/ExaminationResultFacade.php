<?php
        namespace App\Modules\School\ExaminationResult\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExaminationResultFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'examination_results';
            }
        }

        