<?php
namespace Modules\App\Tenant\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\App\Tenant\Models\Tenant;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::updateOrCreate(
            ['code' => 'tenant_a'],
            [
                'name'           => 'Tenant A',
                'tenant_user_id' => 1,
                'db_host'        => '127.0.0.1',
                'db_port'        => '3307',
                'db_name'        => 'school_erp_tenant_a',
                'db_username'    => 'root',
                'db_password'    => 'Samir@007',
            ]
        );

        Tenant::updateOrCreate(
            ['code' => 'tenant_b', 'app_module' => 'School'],
            [
                'name'           => 'Tenant B',
                'tenant_user_id' => 1,
                'db_host'        => '127.0.0.1',
                'db_port'        => '3307',
                'db_name'        => 'school_erp_tenant_b',
                'db_username'    => 'root',
                'db_password'    => 'Samir@007',
            ]
        );
    }
}
