<?php

namespace Modules\Aipt\CostCategory\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CostCategory extends Model
{
    use HasFactory, Blameable;

    protected $table = 'cost_categories';

    protected $fillable = [
        'name',
        'code',
        'description',
        'is_revenue',
        'is_non_revenue',
        'is_system',
        'is_hidden',
        'status',
        'icon',
    ];

    protected $casts = [
        'is_revenue' => 'boolean',
        'is_non_revenue' => 'boolean',
        'is_system' => 'boolean',
        'is_hidden' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
