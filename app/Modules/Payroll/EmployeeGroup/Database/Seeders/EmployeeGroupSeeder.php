<?php

namespace App\Modules\Payroll\EmployeeGroup\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Payroll\EmployeeGroup\Models\EmployeeGroup;

class EmployeeGroupSeeder extends Seeder
{
    public function run(): void
    {
        EmployeeGroup::create(['name' => 'Sample EmployeeGroup']);

        // Uncomment to use factory if available
        // EmployeeGroup::factory()->count(10)->create();
    }
}
