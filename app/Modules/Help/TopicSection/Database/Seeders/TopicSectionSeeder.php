<?php

namespace Modules\Help\TopicSection\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Help\TopicSection\Models\TopicSection;

class TopicSectionSeeder extends Seeder
{
    public function run(): void
    {
        TopicSection::create(['name' => 'Sample TopicSection']);

        // Uncomment to use factory if available
        // TopicSection::factory()->count(10)->create();
    }
}
