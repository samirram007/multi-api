<?php

namespace App\Modules\Maintenance\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Maintenance\Models\Maintenance;

class MaintenanceSeeder extends Seeder
{
    public function run(): void
    {
        Maintenance::create(['name' => 'Sample Maintenance']);

        // Uncomment to use factory if available
        // Maintenance::factory()->count(10)->create();
    }
}
