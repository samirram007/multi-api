<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use Modules\Base\User\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

abstract class TestCase extends BaseTestCase
{
    protected static bool $centralMigrated = false;

    protected function setupTenant(): string
    {
        $apiKey = 'test-tenant-key';
        
        \Illuminate\Support\Facades\DB::table('tenants')->updateOrInsert(
            ['id' => 1],
            [
                'name' => 'Test Tenant',
                'code' => 'TEST',
                'tenant_user_id' => 1,
                'api_key' => $apiKey,
                'db_name' => 'test_tenant_db',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        return $apiKey;
    }

    protected function actingAsUser()
    {
        config(['tenant_id' => 1]);
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        
        $this->withUnencryptedCookie('token', $token);
        $this->withHeader('Authorization', 'Bearer ' . $token);
        
        return $user;
    }
}
