<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('examination_standards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_standard_id')->constrained(table: 'academic_standards')->onDelete(action: 'cascade');
            $table->foreignId('examination_id')->constrained(table: 'examinations')->onDelete(action: 'cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('examination_standards');
    }
};
