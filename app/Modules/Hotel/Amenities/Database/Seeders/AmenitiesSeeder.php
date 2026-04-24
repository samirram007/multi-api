<?php

namespace App\Modules\Hotel\Amenities\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Hotel\Amenities\Models\Amenities;

class AmenitiesSeeder extends Seeder
{
    public function run(): void
    {
        Amenities::create(['name' => 'Sample Amenities']);

        // Uncomment to use factory if available
        // Amenities::factory()->count(10)->create();
    }
}
