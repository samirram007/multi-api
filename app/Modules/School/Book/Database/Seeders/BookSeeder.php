<?php

namespace Modules\School\Book\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\School\Book\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create(['name' => 'Sample Book']);

        // Uncomment to use factory if available
        // Book::factory()->count(10)->create();
    }
}
