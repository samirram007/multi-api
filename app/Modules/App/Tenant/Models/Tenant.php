<?php

namespace Modules\App\Tenant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;

    protected $connection = 'central';

    protected $table = 'tenants';

    protected $fillable = [
        'name',
        'code',
        'tenant_user_id',
        'app_module',
        'description',
        'status',
        'db_host',
        'db_port',
        'db_name',
        'db_username',
        'db_password',
        'api_key',
        'api_key_expires_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
