<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Modules\App\Tenant\Models\Tenant;
use Modules\App\Tenant\Models\TenantUser;

test('it can register an organizational owner', function () {
    $response = $this->postJson('/api/onboarding/register', [
        'name' => 'John Owner',
        'email' => 'owner@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'John Owner')
        ->assertJsonPath('data.user_type', 'owner');

    $this->assertDatabaseHas('tenant_users', [
        'email' => 'owner@example.com',
        'user_type' => 'owner'
    ], 'central');
});

test('it can login as an organizational owner', function () {
    TenantUser::create([
        'name' => 'John Owner',
        'email' => 'owner@example.com',
        'password' => 'password123',
        'user_type' => 'owner',
    ]);

    $response = $this->postJson('/api/onboarding/login', [
        'email' => 'owner@example.com',
        'password' => 'password123',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure(['data' => ['access_token', 'token_type']])
        ->assertCookie('tenant_token');
});

test('an owner can register a new tenant and it auto-provisions', function () {
    $owner = TenantUser::create([
        'name' => 'John Owner',
        'email' => 'owner@example.com',
        'password' => 'password123',
        'user_type' => 'owner',
    ]);

    $token = auth('tenant_api')->login($owner);

    // Mock Artisan call to avoid actual DB creation/migration in test environment
    Artisan::shouldReceive('call')
        ->once()
        ->with('db:tenant', \Mockery::on(function ($args) {
            return $args['action'] === 'migrate' && $args['seed'] === true;
        }))
        ->andReturn(0);

    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->postJson('/api/tenants', [
            'name' => 'New School Branch',
            'code' => 'NSB01',
            'app_module' => 'School',
        ]);

    $response->assertStatus(201);
    
    $tenant = Tenant::where('code', 'NSB01')->first();
    expect($tenant)->not->toBeNull();
    expect($tenant->tenant_user_id)->toBe($owner->id);
    expect($tenant->api_key)->not->toBeNull();
    expect($tenant->db_name)->toStartWith('tenant_new_school_branch_');
});

test('a tenant user cannot access other tenant data using wrong tenant key', function () {
    // 1. Create Tenant A and its user
    $tenantA = Tenant::create([
        'name' => 'School A',
        'code' => 'SCHA',
        'tenant_user_id' => 1,
        'api_key' => 'key_a',
        'db_name' => 'db_a'
    ]);
    
    $userA = TenantUser::create([
        'name' => 'User A',
        'email' => 'user_a@example.com',
        'password' => 'password',
        'tenant_id' => $tenantA->id,
        'user_type' => 'admin'
    ]);

    // 2. Create Tenant B
    $tenantB = Tenant::create([
        'name' => 'School B',
        'code' => 'SCHB',
        'tenant_user_id' => 1,
        'api_key' => 'key_b',
        'db_name' => 'db_b'
    ]);

    // Generate token for User A (scoped to Tenant A)
    config(['tenant_id' => $tenantA->id]);
    $tokenA = auth('tenant_api')->login($userA);

    // 3. Attempt to access Tenant B's 'me' endpoint using Tenant A's token
    $response = $this->withHeaders([
        'X-Tenant-Key' => 'key_b',
        'Authorization' => 'Bearer ' . $tokenA
    ])->getJson('/api/me');

    // Should fail because the tenant_id in JWT (A) doesn't match the active tenant from header (B)
    $response->assertStatus(401)
        ->assertJsonPath('message', 'Token mismatch for this tenant.');
});
