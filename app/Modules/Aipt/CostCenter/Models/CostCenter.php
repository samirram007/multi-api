<?php

namespace Modules\Aipt\CostCenter\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Aipt\CostCategory\Models\CostCategory;

class CostCenter extends Model
{
    use HasFactory, Blameable;

    protected $table = 'cost_centers';

    protected $fillable = [
        'name',
        'code',
        'description',
        'cost_category_id',
        'is_system',
        'is_hidden',
        'status',
        'icon',
    ];

    protected $casts = [
        'is_system' => 'boolean',
        'is_hidden' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function costCategory()
    {
        return $this->belongsTo(CostCategory::class, 'cost_category_id');
    }
}
