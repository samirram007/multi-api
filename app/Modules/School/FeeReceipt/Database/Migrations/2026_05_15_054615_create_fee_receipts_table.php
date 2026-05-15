<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fee_receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paid_by_user_id');
            $table->date('receipt_date');
            $table->decimal('amount', 10, 2);
            $table->string('payment_mode')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('receipt_note')->nullable();
            $table->boolean('is_system_receipt')->default(true);
            $table->timestamp('system_receipt_date')->nullable();
            // $table->foreign('paid_by_user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_receipts');
    }
};
