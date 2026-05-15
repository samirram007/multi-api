<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('education_boards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->require();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->string('contact_no')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->date('establishment_date')->nullable();
            $table->unsignedBigInteger('logo_image_id')->nullable();
            // $table->string('logo_image')->default(value:'/images/default_logo.png');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education_boards');
    }
};
