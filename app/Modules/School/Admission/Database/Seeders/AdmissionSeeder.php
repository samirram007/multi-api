<?php

namespace App\Modules\School\Admission\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\Admission\Models\Admission;

class AdmissionSeeder extends Seeder
{
    public function run(): void
    {
        Admission::create(['name' => 'Sample Admission']);

        // Uncomment to use factory if available
        // Admission::factory()->count(10)->create();
    }
}
