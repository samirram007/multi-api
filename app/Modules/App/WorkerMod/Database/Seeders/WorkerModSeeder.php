<?php

namespace App\Modules\WorkerMod\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\WorkerMod\Models\WorkerMod;

class WorkerModSeeder extends Seeder
{
    public function run(): void
    {
        WorkerMod::create(['name' => 'Sample WorkerMod']);

        // Uncomment to use factory if available
        // WorkerMod::factory()->count(10)->create();
    }
}
