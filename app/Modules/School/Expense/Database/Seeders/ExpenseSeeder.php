<?php

namespace App\Modules\School\Expense\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\Expense\Models\Expense;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        Expense::create(['name' => 'Sample Expense']);

        // Uncomment to use factory if available
        // Expense::factory()->count(10)->create();
    }
}
