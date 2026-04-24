<?php

namespace App\Modules\School\Guardian\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\Guardian\Models\Guardian;

class GuardianSeeder extends Seeder
{
    public function run(): void
    {
        Guardian::create(['name' => 'Sample Guardian']);

        // Uncomment to use factory if available
        // Guardian::factory()->count(10)->create();
    }
}
