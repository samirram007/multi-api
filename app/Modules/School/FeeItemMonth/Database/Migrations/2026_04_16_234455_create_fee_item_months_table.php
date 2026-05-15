<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fee_item_months', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_item_id');
            $table->unsignedBigInteger('student_session_id');
            $table->unsignedBigInteger('month_id');
            $table->decimal('amount', 10, 2);
            // $table->foreign('fee_item_id')->references('id')->on('fee_items');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_item_months');
    }
};
