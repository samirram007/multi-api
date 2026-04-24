<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('academic_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->require();
            $table->string('code')->nullable();
            $table->foreignId(column: 'campus_id');
            $table->foreignId(column: 'academic_standard_id');
            $table->foreignId(column: 'section_id');
            $table->integer('capacity')->default(50);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_classes');
    }
};
