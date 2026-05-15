<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fee_template_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_index')->default(1);
            $table->unsignedBigInteger('fee_template_id');
            $table->unsignedBigInteger('fee_head_id');
            $table->decimal('amount', 10, 2);
            $table->boolean('is_customizable')->default(true);
            $table->boolean('keep_periodic_details')->default(false);
            $table->foreign('fee_template_id')->references('id')->on('fee_templates');
            $table->foreign('fee_head_id')->references('id')->on('fee_heads');
            $table->unique(["fee_head_id", "fee_template_id"], 'fee_head_fee_template_unique');
            $table->unique(["name", "fee_template_id"], 'name_fee_template_unique');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_template_items');
    }
};
