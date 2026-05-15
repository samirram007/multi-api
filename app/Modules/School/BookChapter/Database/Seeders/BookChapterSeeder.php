<?php

namespace Modules\School\BookChapter\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\BookChapter\Models\BookChapter;

class BookChapterSeeder extends Seeder
{
    public function run(): void
    {
        BookChapter::create(['name' => 'Sample BookChapter']);

        // Uncomment to use factory if available
        // BookChapter::factory()->count(10)->create();
    }
}
