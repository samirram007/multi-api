<?php

namespace Modules\School\BookModule\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookModule extends Model
{
    use HasFactory;

    protected $table = 'book_modules';

    protected $fillable = [
        'book_id',
        'name',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
