<?php

namespace App\Modules\School\EducationBoard\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\School\EducationBoard\Models\EducationBoard;

class EducationBoardSeeder extends Seeder
{
    public function run(): void
    {
        EducationBoard::create(['name' => 'Sample EducationBoard']);

        // Uncomment to use factory if available
        // EducationBoard::factory()->count(10)->create();
    }
}
