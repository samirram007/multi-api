<?php

namespace Modules\Help\TopicArticle\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Help\TopicArticle\Models\TopicArticle;

class TopicArticleSeeder extends Seeder
{
    public function run(): void
    {
        TopicArticle::create(['name' => 'Sample TopicArticle']);

        // Uncomment to use factory if available
        // TopicArticle::factory()->count(10)->create();
    }
}
