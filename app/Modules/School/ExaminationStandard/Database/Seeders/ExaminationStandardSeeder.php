<?php

namespace App\Modules\School\ExaminationStandard\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\ExaminationStandard\Models\ExaminationStandard;

class ExaminationStandardSeeder extends Seeder
{
    public function run(): void
    {
        ExaminationStandard::create(['name' => 'Sample ExaminationStandard']);

        // Uncomment to use factory if available
        // ExaminationStandard::factory()->count(10)->create();
    }
}
