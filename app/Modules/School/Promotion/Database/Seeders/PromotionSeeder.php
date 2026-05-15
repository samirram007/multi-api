<?php

namespace Modules\School\Promotion\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Promotion\Models\Promotion;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        Promotion::create(['name' => 'Sample Promotion']);

        // Uncomment to use factory if available
        // Promotion::factory()->count(10)->create();
    }
}
