<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username', 100)->unique();
            $table->string('code', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('contact_no', 100)->nullable();
            $table->string('password');
            $table->enum('status', ['active', 'inactive', 'deleted', 'blocked', 'suspended'])->default('active');
            $table->string('emergency_contact_name', 100)->nullable();
            $table->string('emergency_contact_no', 20)->nullable();
            $table->string('birth_mark', 100)->nullable();
            $table->text('medical_conditions')->nullable();
            $table->text('allergies')->nullable();
            $table->string('language', 50)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('caste', 50)->nullable();
            $table->string('guardian_type', 50)->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->unsignedBigInteger('academic_session_id')->nullable();
            $table->unsignedBigInteger('academic_class_id')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('doj')->nullable();
            $table->date('dob')->nullable();
            $table->string('aadhaar_no', 20)->nullable();
            $table->string('admission_no', 100)->nullable();
            $table->string('admission_age', 100)->nullable();
            $table->string('a_class', 100)->nullable();
            $table->date('admission_date')->nullable();
            $table->unsignedBigInteger('profile_document_id')->nullable();
            $table->string('bank_name', 100)->nullable();
            $table->string('account_holder_name', 100)->nullable();
            $table->string('bank_account_no', 20)->nullable();
            $table->string('bank_ifsc', 20)->nullable();
            $table->string('bank_branch', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
