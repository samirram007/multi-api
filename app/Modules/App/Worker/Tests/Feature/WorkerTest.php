<?php

namespace App\Modules\Worker\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Worker\Models\Worker;

class WorkerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_workers(): void
    {
        $response = $this->getJson('/api/workers');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Worker(): void
    {
        $data = ['name' => 'Test Worker'];

        $response = $this->postJson('/api/workers', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('workers', $data);
    }

    public function test_can_show_Worker(): void
    {
        $Worker = Worker::factory()->create();

        $response = $this->getJson('/api/workers/' . $Worker->id);
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

    public function test_can_update_Worker(): void
    {
        $Worker = Worker::factory()->create();
        $data = ['name' => 'Updated Worker'];

        $response = $this->putJson('/api/workers/' . $Worker->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('workers', $data);
    }

    public function test_can_delete_Worker(): void
    {
        $Worker = Worker::factory()->create();

        $response = $this->deleteJson('/api/workers/' . $Worker->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('workers', ['id' => $Worker->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/workers', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
