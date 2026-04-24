<?php

namespace App\Modules\Resturant\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Resturant\Order\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::create(['name' => 'Sample Order']);

        // Uncomment to use factory if available
        // Order::factory()->count(10)->create();
    }
}
