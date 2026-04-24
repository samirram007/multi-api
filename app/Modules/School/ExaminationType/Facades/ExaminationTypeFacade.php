<?php
        namespace App\Modules\School\ExaminationType\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExaminationTypeFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'examination_types';
            }
        }

        