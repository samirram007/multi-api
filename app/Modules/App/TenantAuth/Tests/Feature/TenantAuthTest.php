<?php

namespace Modules\App\TenantAuth\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\App\TenantAuth\Models\TenantAuth;

class TenantAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tenant_auths(): void
    {
        $response = $this->getJson('/api/tenant_auths');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_TenantAuth(): void
    {
        $data = ['name' => 'Test TenantAuth'];

        $response = $this->postJson('/api/tenant_auths', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tenant_auths', $data);
    }

    public function test_can_show_TenantAuth(): void
    {
        $TenantAuth = TenantAuth::factory()->create();

        $response = $this->getJson('/api/tenant_auths/' . $TenantAuth->id);
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

    public function test_can_update_TenantAuth(): void
    {
        $TenantAuth = TenantAuth::factory()->create();
        $data = ['name' => 'Updated TenantAuth'];

        $response = $this->putJson('/api/tenant_auths/' . $TenantAuth->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tenant_auths', $data);
    }

    public function test_can_delete_TenantAuth(): void
    {
        $TenantAuth = TenantAuth::factory()->create();

        $response = $this->deleteJson('/api/tenant_auths/' . $TenantAuth->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('tenant_auths', ['id' => $TenantAuth->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/tenant_auths', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
