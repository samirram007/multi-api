<?php

use App\Enums\DocumentPrivacyLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->boolean('is_root')->default(false);
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('path')->nullable();
            $table->string('name');
            $table->string('original_name')->nullable();
            $table->string('document_type')->default('folder');
            $table->string('caption')->nullable();
            $table->string('description')->nullable();
            $table->enum('storage_type', ['local', 'web', 's3', 'google', 'proxy', 'others'])->default('local');
            $table->text('link')->nullable();
            $table->string('extension')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('size')->nullable();
            $table->enum('privacy_level', DocumentPrivacyLevel::getValues())->default(DocumentPrivacyLevel::PUBLIC);
            $table->text('tags')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->index(['user_id', 'document_type']);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
