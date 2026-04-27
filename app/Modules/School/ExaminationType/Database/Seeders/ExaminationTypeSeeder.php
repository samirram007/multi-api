<?php

namespace Modules\School\ExaminationType\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\ExaminationType\Models\ExaminationType;

class ExaminationTypeSeeder extends Seeder
{
    public function run(): void
    {
        ExaminationType::create(['name' => 'Sample ExaminationType']);

        // Uncomment to use factory if available
        // ExaminationType::factory()->count(10)->create();
    }
}
