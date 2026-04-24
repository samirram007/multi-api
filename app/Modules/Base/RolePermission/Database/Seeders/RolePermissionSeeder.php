<?php

namespace App\Modules\Base\RolePermission\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Base\RolePermission\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        RolePermission::create(['name' => 'Sample RolePermission']);

        // Uncomment to use factory if available
        // RolePermission::factory()->count(10)->create();
    }
}
