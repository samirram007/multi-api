<?php

namespace App\Modules\Base\UserFiscalYear\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Base\UserFiscalYear\Models\UserFiscalYear;

class UserFiscalYearSeeder extends Seeder
{
    public function run(): void
    {
        UserFiscalYear::create(['user_id' => 1, 'fiscal_year_id' => 1]);

        // Uncomment to use factory if available
        // UserFiscalYear::factory()->count(10)->create();
    }
}
