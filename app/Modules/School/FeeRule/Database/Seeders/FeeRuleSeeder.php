<?php

namespace Modules\School\FeeRule\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\FeeRule\Models\FeeRule;

class FeeRuleSeeder extends Seeder
{
    public function run(): void
    {
        FeeRule::create(['name' => 'Sample FeeRule']);

        // Uncomment to use factory if available
        // FeeRule::factory()->count(10)->create();
    }
}
