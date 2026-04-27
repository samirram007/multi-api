<?php

namespace Modules\App\App\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\App\App\Models\App;

class AppSeeder extends Seeder
{
    public function run(): void
    {
        App::create(['name' => 'Sample App']);

        // Uncomment to use factory if available
        // App::factory()->count(10)->create();
    }
}
