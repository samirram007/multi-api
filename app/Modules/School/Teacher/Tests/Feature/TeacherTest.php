<?php

namespace App\Modules\School\Teacher\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Teacher\Models\Teacher;

class TeacherTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_teachers(): void
    {
        $response = $this->getJson('/api/teachers');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Teacher(): void
    {
        $data = ['name' => 'Test Teacher'];

        $response = $this->postJson('/api/teachers', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('teachers', $data);
    }

    public function test_can_show_Teacher(): void
    {
        $Teacher = Teacher::factory()->create();

        $response = $this->getJson('/api/teachers/' . $Teacher->id);
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

    public function test_can_update_Teacher(): void
    {
        $Teacher = Teacher::factory()->create();
        $data = ['name' => 'Updated Teacher'];

        $response = $this->putJson('/api/teachers/' . $Teacher->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('teachers', $data);
    }

    public function test_can_delete_Teacher(): void
    {
        $Teacher = Teacher::factory()->create();

        $response = $this->deleteJson('/api/teachers/' . $Teacher->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('teachers', ['id' => $Teacher->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/teachers', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
