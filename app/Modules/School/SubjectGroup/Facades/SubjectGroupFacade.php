<?php
        namespace Modules\School\SubjectGroup\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\SubjectGroup\Contracts\SubjectGroupServiceInterface;
        class SubjectGroupFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return SubjectGroupServiceInterface::class;
            }
        }

        