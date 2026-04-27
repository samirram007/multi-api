<?php

namespace Modules\School\Floor\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Floor\Models\Floor;

class FloorSeeder extends Seeder
{
    public function run(): void
    {
        Floor::create(['name' => 'Sample Floor']);

        // Uncomment to use factory if available
        // Floor::factory()->count(10)->create();
    }
}
