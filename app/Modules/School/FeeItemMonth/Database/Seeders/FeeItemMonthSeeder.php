<?php

namespace App\Modules\School\FeeItemMonth\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\FeeItemMonth\Models\FeeItemMonth;

class FeeItemMonthSeeder extends Seeder
{
    public function run(): void
    {
        FeeItemMonth::create(['name' => 'Sample FeeItemMonth']);

        // Uncomment to use factory if available
        // FeeItemMonth::factory()->count(10)->create();
    }
}
