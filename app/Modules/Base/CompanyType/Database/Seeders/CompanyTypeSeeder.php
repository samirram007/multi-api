<?php

namespace Modules\Base\CompanyType\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\CompanyType\Models\CompanyType;

class CompanyTypeSeeder extends Seeder
{
    public function run(): void
    {
        CompanyType::create([
            'name' => 'Transport',
            'code' => 'TRAN',
            'description' => 'Transport industry',
            'status' => 'active'
        ]);

        // Uncomment to use factory if available
        // CompanyType::factory()->count(10)->create();
    }
}
