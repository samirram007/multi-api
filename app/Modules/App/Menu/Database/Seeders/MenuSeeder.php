<?php

namespace Modules\App\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\App\Menu\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::create(['name' => 'Sample Menu']);

        // Uncomment to use factory if available
        // Menu::factory()->count(10)->create();
    }
}
