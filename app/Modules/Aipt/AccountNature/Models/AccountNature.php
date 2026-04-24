<?php

namespace App\Modules\Aipt\AccountNature\Models;

use App\Modules\Aipt\AccountLedger\Models\AccountLedger;
use Illuminate\Database\Eloquent\Model;

use App\Modules\Aipt\AccountGroup\Models\AccountGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class AccountNature extends Model
{
    use HasFactory;

    protected $table = 'account_natures';
    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
        'icon',
        'accounting_effect',

    ];
    protected $casts = [
        'accounting_effect' => 'string',
    ];

    public function account_groups(): HasMany
    {
        return $this->hasMany(AccountGroup::class);
    }


    public function account_ledgers(): HasManyThrough
    {
        return $this->hasManyThrough(AccountLedger::class, AccountGroup::class);

    }
}
