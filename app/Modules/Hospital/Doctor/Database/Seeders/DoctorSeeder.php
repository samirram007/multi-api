<?php

namespace Modules\Hospital\Doctor\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Doctor\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create(['name' => 'Sample Doctor']);

        // Uncomment to use factory if available
        // Doctor::factory()->count(10)->create();
    }
}
