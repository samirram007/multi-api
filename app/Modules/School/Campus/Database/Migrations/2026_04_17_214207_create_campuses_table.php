<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Company\Models\Company;
use Modules\School\EducationBoard\Models\EducationBoard;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->nullable();
            $table->foreignIdFor(EducationBoard::class)->nullable();
            $table->string('name')->require()->unique();
            $table->string('code')->nullable();

            $table->string('contact_no')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('establishment_date')->nullable();
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->unsignedBigInteger('logo_image_id')->nullable();
            // $table->string('logo_image')->default(value:'/images/default_logo.png');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campuses');
    }
};
