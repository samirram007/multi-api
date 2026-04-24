<?php

namespace App\Modules\Payroll\Employee\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Payroll\Employee\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::create(['name' => 'Sample Employee']);

        // Uncomment to use factory if available
        // Employee::factory()->count(10)->create();
    }
}
