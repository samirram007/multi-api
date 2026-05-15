<?php

namespace Modules\School\BookModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\BookModule\Models\BookModule;

class BookModuleSeeder extends Seeder
{
    public function run(): void
    {
        BookModule::create(['name' => 'Sample BookModule']);

        // Uncomment to use factory if available
        // BookModule::factory()->count(10)->create();
    }
}
