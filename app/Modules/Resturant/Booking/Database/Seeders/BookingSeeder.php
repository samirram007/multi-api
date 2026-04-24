<?php

namespace App\Modules\Resturant\Booking\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Resturant\Booking\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        Booking::create(['name' => 'Sample Booking']);

        // Uncomment to use factory if available
        // Booking::factory()->count(10)->create();
    }
}
