<?php

namespace App\Modules\Base\UserRole\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Base\UserRole\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        UserRole::create(['name' => 'Sample UserRole']);

        // Uncomment to use factory if available
        // UserRole::factory()->count(10)->create();
    }
}
