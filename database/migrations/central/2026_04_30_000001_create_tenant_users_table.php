<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'central';

    public function up(): void
    {
        Schema::connection('central')->create('tenant_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('status')->default('active');
            $table->string('user_type')->default('admin');
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['email']);
        });
    }

    public function down(): void
    {
        Schema::connection('central')->dropIfExists('tenant_users');
    }
};
