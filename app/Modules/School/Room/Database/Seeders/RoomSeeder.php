<?php

namespace Modules\School\Room\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Room\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create(['name' => 'Sample Room']);

        // Uncomment to use factory if available
        // Room::factory()->count(10)->create();
    }
}
