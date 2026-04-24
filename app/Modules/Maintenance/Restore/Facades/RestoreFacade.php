<?php
        namespace App\Modules\Maintenance\Restore\Facades;
        use Illuminate\Support\Facades\Facade;
        class RestoreFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'restores';
            }
        }

        