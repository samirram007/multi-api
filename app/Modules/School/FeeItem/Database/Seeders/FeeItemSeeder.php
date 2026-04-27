<?php

namespace Modules\School\FeeItem\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\FeeItem\Models\FeeItem;

class FeeItemSeeder extends Seeder
{
    public function run(): void
    {
        FeeItem::create(['name' => 'Sample FeeItem']);

        // Uncomment to use factory if available
        // FeeItem::factory()->count(10)->create();
    }
}
