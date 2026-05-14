<?php

namespace Modules\Aipt\StockJournal\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Aipt\StockJournal\Models\StockJournal;

class StockJournalSeeder extends Seeder
{
    public function run(): void
    {
        StockJournal::create(['name' => 'Sample StockJournal']);

        // Uncomment to use factory if available
        // StockJournal::factory()->count(10)->create();
    }
}
