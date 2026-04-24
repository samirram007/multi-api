<?php

namespace App\Modules\Pathology\Test\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Pathology\Test\Models\Test;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        Test::create(['name' => 'Sample Test']);

        // Uncomment to use factory if available
        // Test::factory()->count(10)->create();
    }
}
