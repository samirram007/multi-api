<?php

namespace App\Modules\School\Campus\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Campus\Models\Campus;

class CampusTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_campuses(): void
    {
        $response = $this->getJson('/api/campuses');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Campus(): void
    {
        $data = ['name' => 'Test Campus'];

        $response = $this->postJson('/api/campuses', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('campuses', $data);
    }

    public function test_can_show_Campus(): void
    {
        $Campus = Campus::factory()->create();

        $response = $this->getJson('/api/campuses/' . $Campus->id);
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

    public function test_can_update_Campus(): void
    {
        $Campus = Campus::factory()->create();
        $data = ['name' => 'Updated Campus'];

        $response = $this->putJson('/api/campuses/' . $Campus->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('campuses', $data);
    }

    public function test_can_delete_Campus(): void
    {
        $Campus = Campus::factory()->create();

        $response = $this->deleteJson('/api/campuses/' . $Campus->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('campuses', ['id' => $Campus->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/campuses', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
