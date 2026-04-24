<?php
        namespace App\Modules\Worker\Facades;
        use Illuminate\Support\Facades\Facade;
        class WorkerFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'workers';
            }
        }

        