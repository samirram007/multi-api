<?php
        namespace App\Modules\School\EducationBoard\Facades;
        use Illuminate\Support\Facades\Facade;
        class EducationBoardFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'education_boards';
            }
        }

        