<?php

namespace Modules\School\FeeReceipt\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\FeeReceipt\Models\FeeReceipt;

class FeeReceiptSeeder extends Seeder
{
    public function run(): void
    {
        FeeReceipt::create(['name' => 'Sample FeeReceipt']);

        // Uncomment to use factory if available
        // FeeReceipt::factory()->count(10)->create();
    }
}
