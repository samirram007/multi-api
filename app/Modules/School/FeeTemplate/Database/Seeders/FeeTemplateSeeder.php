<?php

namespace App\Modules\School\FeeTemplate\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\FeeTemplate\Models\FeeTemplate;

class FeeTemplateSeeder extends Seeder
{
    public function run(): void
    {
        FeeTemplate::create(['name' => 'Sample FeeTemplate']);

        // Uncomment to use factory if available
        // FeeTemplate::factory()->count(10)->create();
    }
}
