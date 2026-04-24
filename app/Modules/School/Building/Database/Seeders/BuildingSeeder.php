<?php

namespace App\Modules\School\Building\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\Building\Models\Building;

class BuildingSeeder extends Seeder
{
    public function run(): void
    {
        Building::create(['name' => 'Sample Building']);

        // Uncomment to use factory if available
        // Building::factory()->count(10)->create();
    }
}
