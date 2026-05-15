<?php

namespace Modules\School\StudentSession\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\StudentSession\Models\StudentSession;

class StudentSessionSeeder extends Seeder
{
    public function run(): void
    {
        StudentSession::create(['name' => 'Sample StudentSession']);

        // Uncomment to use factory if available
        // StudentSession::factory()->count(10)->create();
    }
}
