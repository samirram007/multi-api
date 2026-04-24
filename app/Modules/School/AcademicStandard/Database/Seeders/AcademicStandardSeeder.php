<?php

namespace App\Modules\School\AcademicStandard\Database\Seeders;

use App\Modules\School\AcademicStandard\Models\AcademicStandard;
use Illuminate\Database\Seeder;


class AcademicStandardSeeder extends Seeder
{
    public function run(): void
    {
        AcademicStandard::create(['name' => 'Sample AcademicStandard']);

        // Uncomment to use factory if available
        // AcademicStandard::factory()->count(10)->create();
    }
}
