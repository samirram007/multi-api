<?php

namespace App\Modules\Support\SLAPolicyAction\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Support\SLAPolicyAction\Models\SLAPolicyAction;

class SLAPolicyActionSeeder extends Seeder
{
    public function run(): void
    {
        SLAPolicyAction::create(['name' => 'Sample SLAPolicyAction']);

        // Uncomment to use factory if available
        // SLAPolicyAction::factory()->count(10)->create();
    }
}
