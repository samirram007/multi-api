<?php

namespace Modules\School\EducationBoard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationBoard extends Model
{
    use HasFactory;

    protected $table = 'education_boards';

    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
        'contact_no',
        'email',
        'establishment_date',
        'website',
        'logo_image',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
