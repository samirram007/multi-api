<?php

namespace Modules\App\TenantAuth\Contracts;



use Modules\App\TenantUser\Models\TenantUser;

interface TenantAuthServiceInterface
{

    public function login(array $credentials): ?array;
    public function register(array $data): ?array;
    public function profile(): TenantUser;
    public function logout(): void;

}
