<?php

namespace App\Modules\School\ExpenseGroup\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\ExpenseGroup\Models\ExpenseGroup;

class ExpenseGroupSeeder extends Seeder
{
    public function run(): void
    {
        ExpenseGroup::create(['name' => 'Sample ExpenseGroup']);

        // Uncomment to use factory if available
        // ExpenseGroup::factory()->count(10)->create();
    }
}
