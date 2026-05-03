<?php

namespace Modules\App\Tenant\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\App\Tenant\Models\Tenant;

class TenantTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tenants(): void
    {
        $response = $this->getJson('/api/tenants');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Tenant(): void
    {
        $data = ['name' => 'Test Tenant'];

        $response = $this->postJson('/api/tenants', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tenants', $data);
    }

    public function test_can_show_Tenant(): void
    {
        $Tenant = Tenant::factory()->create();

        $response = $this->getJson('/api/tenants/' . $Tenant->id);
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

    public function test_can_update_Tenant(): void
    {
        $Tenant = Tenant::factory()->create();
        $data = ['name' => 'Updated Tenant'];

        $response = $this->putJson('/api/tenants/' . $Tenant->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tenants', $data);
    }

    public function test_can_delete_Tenant(): void
    {
        $Tenant = Tenant::factory()->create();

        $response = $this->deleteJson('/api/tenants/' . $Tenant->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('tenants', ['id' => $Tenant->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/tenants', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
