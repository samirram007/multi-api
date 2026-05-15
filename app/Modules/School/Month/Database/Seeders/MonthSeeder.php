<?php

namespace Modules\School\Month\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Month\Models\Month;

class MonthSeeder extends Seeder
{
    public function run(): void
    {
        Month::create(['name' => 'Sample Month']);

        // Uncomment to use factory if available
        // Month::factory()->count(10)->create();
    }
}
