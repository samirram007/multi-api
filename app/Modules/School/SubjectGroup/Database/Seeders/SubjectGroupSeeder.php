<?php

namespace Modules\School\SubjectGroup\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\SubjectGroup\Models\SubjectGroup;

class SubjectGroupSeeder extends Seeder
{
    public function run(): void
    {
        SubjectGroup::create(['name' => 'Sample SubjectGroup']);

        // Uncomment to use factory if available
        // SubjectGroup::factory()->count(10)->create();
    }
}
