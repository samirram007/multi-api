<?php

namespace App\Modules\Worker\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Worker\Models\Worker;

class WorkerSeeder extends Seeder
{
    public function run(): void
    {
        Worker::create(['name' => 'Sample Worker']);

        // Uncomment to use factory if available
        // Worker::factory()->count(10)->create();
    }
}
