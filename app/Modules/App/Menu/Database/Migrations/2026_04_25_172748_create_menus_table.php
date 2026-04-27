<?php

use App\Enums\MenuType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->enum('menu_type', MenuType::getValues())->default(MenuType::MenuItem);

            $table->integer('app_id')->default(1);
            $table->string('title')->unique();
            $table->string('link')->unique();
            $table->unsignedBigInteger('app_module_id')->nullable();
            $table->string('status')->default('active');
            $table->string('icon')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->integer('order_index')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
