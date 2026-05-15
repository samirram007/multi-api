<?php

namespace Modules\School\FeeFeeReceipt\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeFeeReceipt extends Model
{
    use HasFactory;

    protected $table = 'fee_fee_receipts';

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
