<?php

namespace App\Modules\School\Examination\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\Examination\Models\Examination;

class ExaminationSeeder extends Seeder
{
    public function run(): void
    {
        Examination::create(['name' => 'Sample Examination']);

        // Uncomment to use factory if available
        // Examination::factory()->count(10)->create();
    }
}
