<?php
        namespace App\Modules\Pathology\Test\Facades;
        use Illuminate\Support\Facades\Facade;
        class TestFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'tests';
            }
        }

        