<?php

namespace Modules\School\Student\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentSession extends Model
{
    protected $table = 'student_sessions';

    protected $fillable = [
        'student_id',
        'academic_session_id',
        'campus_id',
        'academic_class_id',
        'academic_standard_id',
        'section_id',
        'roll_no',
        'status',
        'is_promoted',
        'previous_student_session_id',
        'next_student_session_id',
        'is_idcard_printable',
        'idcard_print_count',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
