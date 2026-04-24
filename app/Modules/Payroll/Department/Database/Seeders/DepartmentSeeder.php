<?php

namespace App\Modules\Payroll\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Payroll\Department\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create(['name' => 'Sample Department']);

        // Uncomment to use factory if available
        // Department::factory()->count(10)->create();
    }
}
