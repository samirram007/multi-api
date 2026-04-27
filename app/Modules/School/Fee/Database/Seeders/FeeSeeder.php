<?php

namespace Modules\School\Fee\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Fee\Models\Fee;

class FeeSeeder extends Seeder
{
    public function run(): void
    {
        Fee::create(['name' => 'Sample Fee']);

        // Uncomment to use factory if available
        // Fee::factory()->count(10)->create();
    }
}
