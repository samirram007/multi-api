<?php

namespace Modules\Aipt\Holiday\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Aipt\Holiday\Models\Holiday;

class HolidaySeeder extends Seeder
{
    public function run(): void
    {
        Holiday::create(['name' => 'Sample Holiday']);

        // Uncomment to use factory if available
        // Holiday::factory()->count(10)->create();
    }
}
