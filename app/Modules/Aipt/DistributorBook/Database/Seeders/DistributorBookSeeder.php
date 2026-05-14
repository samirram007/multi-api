<?php

namespace Modules\Aipt\DistributorBook\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Aipt\DistributorBook\Models\DistributorBook;

class DistributorBookSeeder extends Seeder
{
    public function run(): void
    {
        DistributorBook::create(['name' => 'Sample DistributorBook']);

        // Uncomment to use factory if available
        // DistributorBook::factory()->count(10)->create();
    }
}
