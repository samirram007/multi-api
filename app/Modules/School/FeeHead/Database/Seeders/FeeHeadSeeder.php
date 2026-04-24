<?php

namespace App\Modules\School\FeeHead\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\FeeHead\Models\FeeHead;

class FeeHeadSeeder extends Seeder
{
    public function run(): void
    {
        FeeHead::create(['name' => 'Sample FeeHead']);

        // Uncomment to use factory if available
        // FeeHead::factory()->count(10)->create();
    }
}
