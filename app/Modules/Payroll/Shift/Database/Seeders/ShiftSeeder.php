<?php

namespace Modules\Payroll\Shift\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Payroll\Shift\Models\Shift;

class ShiftSeeder extends Seeder
{
    public function run(): void
    {
        Shift::create(['name' => 'Sample Shift']);

        // Uncomment to use factory if available
        // Shift::factory()->count(10)->create();
    }
}
