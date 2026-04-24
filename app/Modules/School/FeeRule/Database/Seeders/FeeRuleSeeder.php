<?php

namespace App\Modules\School\FeeRule\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\FeeRule\Models\FeeRule;

class FeeRuleSeeder extends Seeder
{
    public function run(): void
    {
        FeeRule::create(['name' => 'Sample FeeRule']);

        // Uncomment to use factory if available
        // FeeRule::factory()->count(10)->create();
    }
}
