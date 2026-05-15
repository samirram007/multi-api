<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('examination_type_id')->constrained(table: 'examination_types')->onDelete(action: 'cascade');
            $table->date('examination_start_date');
            $table->date('examination_end_date');
            $table->foreignId('academic_session_id')->constrained(table: 'academic_sessions')->onDelete(action: 'cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('examinations');
    }
};
