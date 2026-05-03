<?php

namespace Modules\App\TenantUser\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\App\TenantUser\Models\TenantUser;

class TenantUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tenant_users(): void
    {
        $response = $this->getJson('/api/tenant_users');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_TenantUser(): void
    {
        $data = ['name' => 'Test TenantUser'];

        $response = $this->postJson('/api/tenant_users', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tenant_users', $data);
    }

    public function test_can_show_TenantUser(): void
    {
        $TenantUser = TenantUser::factory()->create();

        $response = $this->getJson('/api/tenant_users/' . $TenantUser->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         'id',
                         'name',
                         'created_at',
                         'updated_at'
                     ],
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_update_TenantUser(): void
    {
        $TenantUser = TenantUser::factory()->create();
        $data = ['name' => 'Updated TenantUser'];

        $response = $this->putJson('/api/tenant_users/' . $TenantUser->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tenant_users', $data);
    }

    public function test_can_delete_TenantUser(): void
    {
        $TenantUser = TenantUser::factory()->create();

        $response = $this->deleteJson('/api/tenant_users/' . $TenantUser->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('tenant_users', ['id' => $TenantUser->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/tenant_users', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
