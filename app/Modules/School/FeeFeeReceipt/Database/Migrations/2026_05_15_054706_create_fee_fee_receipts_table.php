<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fee_fee_receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_id');
            $table->unsignedBigInteger('fee_receipt_id');
            // $table->foreign('fee_id')->references('id')->on('fees');
            // $table->foreign('fee_receipt_id')->references('id')->on('fee_receipts');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_fee_receipts');
    }
};
