<?php

namespace App\Modules\WorkerMod\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\WorkerMod\Models\WorkerMod;

class WorkerModTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_worker_mods(): void
    {
        $response = $this->getJson('/api/worker_mods');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_WorkerMod(): void
    {
        $data = ['name' => 'Test WorkerMod'];

        $response = $this->postJson('/api/worker_mods', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('worker_mods', $data);
    }

    public function test_can_show_WorkerMod(): void
    {
        $WorkerMod = WorkerMod::factory()->create();

        $response = $this->getJson('/api/worker_mods/' . $WorkerMod->id);
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

    public function test_can_update_WorkerMod(): void
    {
        $WorkerMod = WorkerMod::factory()->create();
        $data = ['name' => 'Updated WorkerMod'];

        $response = $this->putJson('/api/worker_mods/' . $WorkerMod->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('worker_mods', $data);
    }

    public function test_can_delete_WorkerMod(): void
    {
        $WorkerMod = WorkerMod::factory()->create();

        $response = $this->deleteJson('/api/worker_mods/' . $WorkerMod->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('worker_mods', ['id' => $WorkerMod->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/worker_mods', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
