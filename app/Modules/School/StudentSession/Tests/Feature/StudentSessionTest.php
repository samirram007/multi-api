<?php

namespace Modules\School\StudentSession\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\StudentSession\Models\StudentSession;

class StudentSessionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_student_sessions(): void
    {
        $response = $this->getJson('/api/student_sessions');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_StudentSession(): void
    {
        $data = ['name' => 'Test StudentSession'];

        $response = $this->postJson('/api/student_sessions', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('student_sessions', $data);
    }

    public function test_can_show_StudentSession(): void
    {
        $StudentSession = StudentSession::factory()->create();

        $response = $this->getJson('/api/student_sessions/' . $StudentSession->id);
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

    public function test_can_update_StudentSession(): void
    {
        $StudentSession = StudentSession::factory()->create();
        $data = ['name' => 'Updated StudentSession'];

        $response = $this->putJson('/api/student_sessions/' . $StudentSession->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('student_sessions', $data);
    }

    public function test_can_delete_StudentSession(): void
    {
        $StudentSession = StudentSession::factory()->create();

        $response = $this->deleteJson('/api/student_sessions/' . $StudentSession->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('student_sessions', ['id' => $StudentSession->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/student_sessions', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
