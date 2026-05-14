<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cost_categories', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('name')->unique();
            $table->string('code')->unique()->nullable();
            $table->text('description')->nullable();

            // Configuration
            $table->boolean('is_revenue')->default(true)->comment('Determines if revenue items are allocated to this category');
            $table->boolean('is_non_revenue')->default(false)->comment('Determines if non-revenue items are allocated to this category');

            // Flags
            $table->boolean('is_system')->default(false);
            $table->boolean('is_hidden')->default(false);

            // Metadata
            $table->string('status')->default('active');
            $table->string('icon')->nullable();

            // Audit
            $table->timestamps();
            $table->blamable();

            // Indexing
            $table->index('name');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost_categories');
    }
};
