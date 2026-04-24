<?php

namespace App\Modules\Support\TicketEvent\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Support\TicketEvent\Models\TicketEvent;

class TicketEventSeeder extends Seeder
{
    public function run(): void
    {
        TicketEvent::create(['name' => 'Sample TicketEvent']);

        // Uncomment to use factory if available
        // TicketEvent::factory()->count(10)->create();
    }
}
