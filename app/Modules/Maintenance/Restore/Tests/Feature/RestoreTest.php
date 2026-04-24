<?php

namespace App\Modules\Maintenance\Restore\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Maintenance\Restore\Models\Restore;

class RestoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_restores(): void
    {
        $response = $this->getJson('/api/restores');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Restore(): void
    {
        $data = ['name' => 'Test Restore'];

        $response = $this->postJson('/api/restores', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('restores', $data);
    }

    public function test_can_show_Restore(): void
    {
        $Restore = Restore::factory()->create();

        $response = $this->getJson('/api/restores/' . $Restore->id);
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

    public function test_can_update_Restore(): void
    {
        $Restore = Restore::factory()->create();
        $data = ['name' => 'Updated Restore'];

        $response = $this->putJson('/api/restores/' . $Restore->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('restores', $data);
    }

    public function test_can_delete_Restore(): void
    {
        $Restore = Restore::factory()->create();

        $response = $this->deleteJson('/api/restores/' . $Restore->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('restores', ['id' => $Restore->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/restores', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
