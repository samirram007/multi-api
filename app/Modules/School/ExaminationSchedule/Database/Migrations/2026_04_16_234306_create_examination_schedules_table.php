<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('examination_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examination_standard_id')->constrained(table: 'examination_standards')->onDelete(action: 'cascade');
            $table->foreignId('subject_id')->constrained(table: 'subjects')->onDelete(action: 'cascade');
            $table->date('examination_date');
            $table->time('examination_time');
            $table->foreignId('teacher_id')->constrained(table: 'users')->onDelete(action: 'cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('examination_schedules');
    }
};
