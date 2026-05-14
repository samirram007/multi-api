<?php

namespace Modules\Aipt\HsnSacCode\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Aipt\HsnSacCode\Models\HsnSacCode;

class HsnSacCodeSeeder extends Seeder
{
    public function run(): void
    {
        HsnSacCode::create(['name' => 'Sample HsnSacCode']);

        // Uncomment to use factory if available
        // HsnSacCode::factory()->count(10)->create();
    }
}
