<?php

namespace Modules\Payroll\Salary\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Payroll\Salary\Models\Salary;

class SalarySeeder extends Seeder
{
    public function run(): void
    {
        Salary::create(['name' => 'Sample Salary']);

        // Uncomment to use factory if available
        // Salary::factory()->count(10)->create();
    }
}
