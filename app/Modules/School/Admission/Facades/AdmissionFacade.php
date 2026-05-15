<?php
        namespace Modules\School\Admission\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Admission\Contracts\AdmissionServiceInterface;
        class AdmissionFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return AdmissionServiceInterface::class;
            }
        }

        