<?php

namespace Modules\School\ExaminationSchedule\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExaminationSchedule extends Model
{
    use HasFactory;

    protected $table = 'examination_schedules';

    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
        'examination_date',
        'examination_time',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
