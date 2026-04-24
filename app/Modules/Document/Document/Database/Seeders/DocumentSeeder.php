<?php

namespace App\Modules\Document\Document\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Document\Document\Models\Document;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        Document::create(['name' => 'Sample Document']);

        // Uncomment to use factory if available
        // Document::factory()->count(10)->create();
    }
}
