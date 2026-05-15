<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('examination_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examination_scheduled_id')->constrained(table: 'examination_schedules')->onDelete(action: 'cascade');
            $table->string('marks');
            $table->foreignId('student_id')->constrained(table: 'users')->onDelete(action: 'cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('examination_results');
    }
};
