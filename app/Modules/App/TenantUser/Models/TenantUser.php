<?php
namespace Modules\App\TenantUser\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class TenantUser extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    protected $connection = 'central';
    protected $table = 'tenant_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}

