<?php
        namespace Modules\School\EducationBoard\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\EducationBoard\Contracts\EducationBoardServiceInterface;
        class EducationBoardFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return EducationBoardServiceInterface::class;
            }
        }

        