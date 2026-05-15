<?php

namespace Modules\School\Section\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Section\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        Section::create(['name' => 'Sample Section']);

        // Uncomment to use factory if available
        // Section::factory()->count(10)->create();
    }
}
