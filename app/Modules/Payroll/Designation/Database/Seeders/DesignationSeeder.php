<?php

namespace Modules\Payroll\Designation\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Payroll\Designation\Models\Designation;

class DesignationSeeder extends Seeder
{
    public function run(): void
    {
        Designation::create(['name' => 'Sample Designation']);

        // Uncomment to use factory if available
        // Designation::factory()->count(10)->create();
    }
}
