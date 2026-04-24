<?php

namespace App\Modules\School\ExpenseHead\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\ExpenseHead\Models\ExpenseHead;

class ExpenseHeadSeeder extends Seeder
{
    public function run(): void
    {
        ExpenseHead::create(['name' => 'Sample ExpenseHead']);

        // Uncomment to use factory if available
        // ExpenseHead::factory()->count(10)->create();
    }
}
