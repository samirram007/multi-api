<?php

namespace Modules\App\TenantAuth\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\App\TenantUser\Models\TenantUser;
use Illuminate\Support\Facades\Hash;

class TenantAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_register_tenant_user(): void
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->postJson('/api/onboarding/register', $data);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         'access_token',
                         'token_type',
                         'expires_in'
                     ],
                     'status',
                     'code'
                 ]);

        $this->assertDatabaseHas('tenant_users', ['email' => 'test@example.com']);
    }

    public function test_can_login_tenant_user(): void
    {
        $user = TenantUser::create([
            'name' => 'Login User',
            'email' => 'login@example.com',
            'password' => Hash::make('password'),
        ]);

        $data = [
            'email' => 'login@example.com',
            'password' => 'password',
        ];

        $response = $this->postJson('/api/onboarding/login', $data);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         'access_token',
                         'token_type',
                         'expires_in'
                     ],
                     'status',
                     'code'
                 ]);
    }

    public function test_can_get_profile(): void
    {
        $user = TenantUser::create([
            'name' => 'Profile User',
            'email' => 'profile@example.com',
            'password' => Hash::make('password'),
        ]);

        $token = auth('tenant_api')->login($user);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->getJson('/api/onboarding/profile');

        $response->assertStatus(200)
                 ->assertJsonPath('data.email', 'profile@example.com');
    }
}
