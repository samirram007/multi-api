<?php

namespace Modules\School\AcademicSession\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicSession extends Model
{
    use HasFactory;

    protected $table = 'academic_sessions';

    protected $fillable = [
        'campus_id',
        'session',
        'start_date',
        'end_date',
        'previous_academic_session_id',
        'next_academic_session_id',
        'current_fee_no',
        'current_expense_no',
        'current_transport_expense_no',
        'is_current',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
