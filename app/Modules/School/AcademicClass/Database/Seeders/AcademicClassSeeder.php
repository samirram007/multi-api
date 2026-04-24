<?php

namespace App\Modules\School\AcademicClass\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\AcademicClass\Models\AcademicClass;

class AcademicClassSeeder extends Seeder
{
    public function run(): void
    {
        AcademicClass::create(['name' => 'Sample AcademicClass']);

        // Uncomment to use factory if available
        // AcademicClass::factory()->count(10)->create();
    }
}
