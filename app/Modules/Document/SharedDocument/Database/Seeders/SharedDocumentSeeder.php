<?php

namespace App\Modules\Document\SharedDocument\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Document\SharedDocument\Models\SharedDocument;

class SharedDocumentSeeder extends Seeder
{
    public function run(): void
    {
        SharedDocument::create(['name' => 'Sample SharedDocument']);

        // Uncomment to use factory if available
        // SharedDocument::factory()->count(10)->create();
    }
}
