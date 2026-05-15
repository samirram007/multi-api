<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->require();
            $table->string('code')->nullable();
            $table->text('description');
            $table->foreignId('subject_id')->constrained();
            $table->year('publication_year')->nullable();
            $table->integer('page_count')->default(10);
            $table->float('price', 8, 2)->unsigned()->default(0.00);
            $table->timestamp('published_at')->nullable();
            $table->string('publisher')->nullable();
            $table->string('author')->nullable();
            $table->string('illustrator')->nullable();
            $table->string('translator')->nullable();
            $table->unsignedBigInteger('cover_image_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
