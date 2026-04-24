<?php

namespace App\Modules\Base\Address\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Base\Address\Models\Address;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        Address::create(['name' => 'Sample Address']);

        // Uncomment to use factory if available
        // Address::factory()->count(10)->create();
    }
}
