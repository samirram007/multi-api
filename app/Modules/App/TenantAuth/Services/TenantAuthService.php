<?php

namespace Modules\App\TenantAuth\Services;

use Modules\App\TenantAuth\Contracts\TenantAuthServiceInterface;
use Modules\App\TenantAuth\Models\TenantAuth;
use Illuminate\Database\Eloquent\Collection;
use Modules\App\TenantUser\Facades\TenantUserFacade;
use Modules\App\TenantUser\Models\TenantUser;

class TenantAuthService implements TenantAuthServiceInterface
{
    protected $resource = [];


    public function login(array $credentials): ?array
    {
        $token = auth('tenant_api')->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);

        if (!$token) {
            return null;
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('tenant_api')->factory()->getTTL() * 60
        ];
    }

    public function register(array $data): ?array
    {
        $data['user_type'] = $data['user_type'] ?? 'owner';
        $password = $data['password'];
        $user = TenantUserFacade::store($data);

        $token = auth('tenant_api')->attempt([
            'email' => $user->email,
            'password' => $password,
        ]);

        if (!$token) {
            return null;
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('tenant_api')->factory()->getTTL() * 60,
            'name' => $user->name,
            'email' => $user->email,
            'user_type' => $user->user_type,
        ];

    }

    public function profile(): TenantUser
    {
        return TenantUserFacade::getById(auth('tenant_api')->user()->id);
    }

    public function logout(): void
    {
        auth('tenant_api')->logout();
    }
}
