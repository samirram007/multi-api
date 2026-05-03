<?php

namespace Modules\App\Agent\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\App\Agent\Models\Agent;

class AgentSeeder extends Seeder
{
    public function run(): void
    {
        Agent::create(['name' => 'Sample Agent']);

        // Uncomment to use factory if available
        // Agent::factory()->count(10)->create();
    }
}
