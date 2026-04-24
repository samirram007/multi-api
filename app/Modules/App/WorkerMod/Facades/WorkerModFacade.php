<?php
        namespace App\Modules\WorkerMod\Facades;
        use Illuminate\Support\Facades\Facade;
        class WorkerModFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'worker_mods';
            }
        }

        