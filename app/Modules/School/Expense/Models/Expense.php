<?php

namespace Modules\School\Expense\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
        'expense_date',
        'expense_no',
        'payment_mode',
        'narration',
        'paid_amount',
        'voucher_no',
        'user_id',
        'users',
        'balance_amount',
        'total_amount',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
