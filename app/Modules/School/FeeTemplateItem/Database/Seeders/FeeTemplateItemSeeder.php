<?php

namespace Modules\School\FeeTemplateItem\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\FeeTemplateItem\Models\FeeTemplateItem;

class FeeTemplateItemSeeder extends Seeder
{
    public function run(): void
    {
        FeeTemplateItem::create(['name' => 'Sample FeeTemplateItem']);

        // Uncomment to use factory if available
        // FeeTemplateItem::factory()->count(10)->create();
    }
}
