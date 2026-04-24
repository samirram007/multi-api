<?php

namespace App\Modules\Maintenance\Backup\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Maintenance\Backup\Models\Backup;

class BackupSeeder extends Seeder
{
    public function run(): void
    {
        Backup::create(['name' => 'Sample Backup']);

        // Uncomment to use factory if available
        // Backup::factory()->count(10)->create();
    }
}
