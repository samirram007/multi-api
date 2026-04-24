<?php
        namespace App\Modules\Hotel\Booking\Facades;
        use Illuminate\Support\Facades\Facade;
        class BookingFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'bookings';
            }
        }

        