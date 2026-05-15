<?php
        namespace Modules\School\ExaminationType\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\ExaminationType\Contracts\ExaminationTypeServiceInterface;
        class ExaminationTypeFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return ExaminationTypeServiceInterface::class;
            }
        }

        