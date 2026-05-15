<?php

namespace Modules\School\ExpenseItem\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\ExpenseItem\Models\ExpenseItem;

class ExpenseItemSeeder extends Seeder
{
    public function run(): void
    {
        ExpenseItem::create(['name' => 'Sample ExpenseItem']);

        // Uncomment to use factory if available
        // ExpenseItem::factory()->count(10)->create();
    }
}
