<?php

namespace App\Modules\School\Campus\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\Campus\Models\Campus;

class CampusSeeder extends Seeder
{
    public function run(): void
    {
        Campus::create(['name' => 'Sample Campus']);

        // Uncomment to use factory if available
        // Campus::factory()->count(10)->create();
    }
}
