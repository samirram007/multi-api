<?php

namespace Modules\App\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class App extends Model
{
    use HasFactory;
    protected $connection; // 👈 force second db

    function __construct()
    {

        $this->connection = 'app_os';
    }

    protected $table = 'apps';

    protected $fillable = [
        'name',
        'code',
        'description',
        'status',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
