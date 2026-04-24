<?php
        namespace App\Modules\School\Fee\Facades;
        use Illuminate\Support\Facades\Facade;
        class FeeFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'fees';
            }
        }

        