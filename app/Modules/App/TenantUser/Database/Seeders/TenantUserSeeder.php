<?php
namespace Modules\App\TenantUser\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\App\TenantUser\Models\TenantUser;

class TenantUserSeeder extends Seeder
{
    public function run(): void
    {
        TenantUser::updateOrCreate(
            ['code' => 'tenant_a'],
            [
                'name'     => 'Tenant A',
                'email'    => 'tetant_a@gmail.com',
                'password' => 'Samir@007',
            ]
        );
    }
}
