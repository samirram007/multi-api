<?php

namespace Modules\Aipt\StockItemPrice\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Aipt\StockItemPrice\Models\StockItemPrice;

class StockItemPriceSeeder extends Seeder
{
    public function run(): void
    {
        StockItemPrice::create(['name' => 'Sample StockItemPrice']);

        // Uncomment to use factory if available
        // StockItemPrice::factory()->count(10)->create();
    }
}
