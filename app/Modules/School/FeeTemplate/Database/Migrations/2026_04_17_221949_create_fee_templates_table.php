<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fee_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('academic_session_id');
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('academic_class_id');
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->foreign('academic_session_id')->references('id')->on('academic_sessions');
            $table->foreign('academic_class_id')->references('id')->on('academic_classes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_templates');
    }
};
