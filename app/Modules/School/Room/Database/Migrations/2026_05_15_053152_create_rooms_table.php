<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->require();
            $table->string('code')->nullable();
            $table->foreignId(column: 'floor_id')
                ->constrained(table: 'floors')
                ->onDelete(action: 'cascade');
            $table->integer('capacity')->nullable();
            $table->boolean('is_available')->default(value: true);
            $table->enum('room_type', array_keys(RoomTypeEnum::labels()))->default(RoomTypeEnum::default());
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
