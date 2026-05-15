<?php

namespace Modules\School\FeeFeeReceipt\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\FeeFeeReceipt\Models\FeeFeeReceipt;

class FeeFeeReceiptSeeder extends Seeder
{
    public function run(): void
    {
        FeeFeeReceipt::create(['name' => 'Sample FeeFeeReceipt']);

        // Uncomment to use factory if available
        // FeeFeeReceipt::factory()->count(10)->create();
    }
}
