<?php

namespace App\Modules\School\ExaminationResult\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\ExaminationResult\Models\ExaminationResult;

class ExaminationResultSeeder extends Seeder
{
    public function run(): void
    {
        ExaminationResult::create(['name' => 'Sample ExaminationResult']);

        // Uncomment to use factory if available
        // ExaminationResult::factory()->count(10)->create();
    }
}
