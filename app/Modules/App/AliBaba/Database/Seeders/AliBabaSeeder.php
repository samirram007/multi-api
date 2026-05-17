<?php

namespace Modules\App\AliBaba\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\App\AliBaba\Models\AliBaba;

class AliBabaSeeder extends Seeder
{
    public function run(): void
    {
        AliBaba::create([
            'name' => 'Sample AliBaba',
            'code' => 'SMPL',
        ]);
    }
}
