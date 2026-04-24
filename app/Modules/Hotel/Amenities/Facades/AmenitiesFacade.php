<?php
        namespace App\Modules\Hotel\Amenities\Facades;
        use Illuminate\Support\Facades\Facade;
        class AmenitiesFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'amenities';
            }
        }

        