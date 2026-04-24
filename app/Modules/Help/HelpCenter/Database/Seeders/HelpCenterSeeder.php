<?php

namespace App\Modules\Help\HelpCenter\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Help\HelpCenter\Models\HelpCenter;

class HelpCenterSeeder extends Seeder
{
    public function run(): void
    {
        HelpCenter::create(['name' => 'Sample HelpCenter']);

        // Uncomment to use factory if available
        // HelpCenter::factory()->count(10)->create();
    }
}
