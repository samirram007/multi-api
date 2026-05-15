<?php

namespace Modules\School\Subject\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Subject\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create(['name' => 'Sample Subject']);

        // Uncomment to use factory if available
        // Subject::factory()->count(10)->create();
    }
}
