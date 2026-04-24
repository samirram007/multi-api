<?php

namespace App\Modules\School\ExaminationSchedule\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\ExaminationSchedule\Models\ExaminationSchedule;

class ExaminationScheduleSeeder extends Seeder
{
    public function run(): void
    {
        ExaminationSchedule::create(['name' => 'Sample ExaminationSchedule']);

        // Uncomment to use factory if available
        // ExaminationSchedule::factory()->count(10)->create();
    }
}
