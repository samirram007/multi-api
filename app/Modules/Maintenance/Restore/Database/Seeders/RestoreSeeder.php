<?php

namespace App\Modules\Maintenance\Restore\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Maintenance\Restore\Models\Restore;

class RestoreSeeder extends Seeder
{
    public function run(): void
    {
        Restore::create(['name' => 'Sample Restore']);

        // Uncomment to use factory if available
        // Restore::factory()->count(10)->create();
    }
}
