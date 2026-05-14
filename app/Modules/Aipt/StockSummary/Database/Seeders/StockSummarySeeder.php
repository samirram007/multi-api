<?php

namespace Modules\Aipt\StockSummary\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Aipt\StockSummary\Models\StockSummary;

class StockSummarySeeder extends Seeder
{
    public function run(): void
    {
        StockSummary::create(['name' => 'Sample StockSummary']);

        // Uncomment to use factory if available
        // StockSummary::factory()->count(10)->create();
    }
}
