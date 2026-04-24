<?php

namespace App\Modules\School\Guardian\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Guardian\Models\Guardian;

class GuardianTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_guardians(): void
    {
        $response = $this->getJson('/api/guardians');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Guardian(): void
    {
        $data = ['name' => 'Test Guardian'];

        $response = $this->postJson('/api/guardians', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('guardians', $data);
    }

    public function test_can_show_Guardian(): void
    {
        $Guardian = Guardian::factory()->create();

        $response = $this->getJson('/api/guardians/' . $Guardian->id);
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

    public function test_can_update_Guardian(): void
    {
        $Guardian = Guardian::factory()->create();
        $data = ['name' => 'Updated Guardian'];

        $response = $this->putJson('/api/guardians/' . $Guardian->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('guardians', $data);
    }

    public function test_can_delete_Guardian(): void
    {
        $Guardian = Guardian::factory()->create();

        $response = $this->deleteJson('/api/guardians/' . $Guardian->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('guardians', ['id' => $Guardian->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/guardians', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
