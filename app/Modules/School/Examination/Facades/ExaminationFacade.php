<?php
        namespace Modules\School\Examination\Facades;
        use Illuminate\Support\Facades\Facade;
        class ExaminationFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'examinations';
            }
        }

        