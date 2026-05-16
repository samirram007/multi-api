<?php

namespace Modules\School\Book\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name',
        'code',
        'description',
        'subject_id',
        'publication_year',
        'page_count',
        'price',
        'published_at',
        'publisher',
        'author',
        'illustrator',
        'translator',
        'cover_image_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
