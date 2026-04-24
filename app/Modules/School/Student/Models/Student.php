<?php

namespace App\Modules\School\Student\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'username',
        'code',
        'email',
        'contact_no',
        'password',
        'status',
        'emergency_contact_name',
        'emergency_contact_no',
        'birth_mark',
        'medical_conditions',
        'allergies',
        'language',
        'nationality',
        'religion',
        'caste',
        'guardian_type',
        'address_id',
        'campus_id',
        'academic_session_id',
        'academic_class_id',
        'gender',
        'doj',
        'dob',
        'aadhaar_no',
        'admission_no',
        'admission_age',
        'a_class',
        'admission_date',
        'profile_document_id',
        'bank_name',
        'account_holder_name',
        'bank_account_no',
        'bank_ifsc',
        'bank_branch',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
