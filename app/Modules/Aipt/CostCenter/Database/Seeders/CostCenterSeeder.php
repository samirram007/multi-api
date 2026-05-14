<?php

namespace Modules\Aipt\CostCenter\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Aipt\CostCenter\Models\CostCenter;

class CostCenterSeeder extends Seeder
{
    public function run(): void
    {
        CostCenter::create(['name' => 'Sample CostCenter']);

        // Uncomment to use factory if available
        // CostCenter::factory()->count(10)->create();
    }
}
