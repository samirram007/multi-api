<?php

namespace App\Modules\School\IncomeGroup\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\IncomeGroup\Models\IncomeGroup;

class IncomeGroupSeeder extends Seeder
{
    public function run(): void
    {
        IncomeGroup::create(['name' => 'Sample IncomeGroup']);

        // Uncomment to use factory if available
        // IncomeGroup::factory()->count(10)->create();
    }
}
