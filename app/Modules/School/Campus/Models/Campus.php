<?php

namespace Modules\School\Campus\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'campuses';

    protected $fillable = [
        'company_id',
        'education_board_id',
        'name',
        'code',
        'contact_no',
        'email',
        'establishment_date',
        'opening_time',
        'closing_time',
        'logo_image_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
