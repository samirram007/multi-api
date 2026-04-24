<?php

namespace App\Modules\School\AcademicSession\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\AcademicSession\Models\AcademicSession;

class AcademicSessionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_academic_sessions(): void
    {
        $response = $this->getJson('/api/academic_sessions');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_AcademicSession(): void
    {
        $data = ['name' => 'Test AcademicSession'];

        $response = $this->postJson('/api/academic_sessions', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('academic_sessions', $data);
    }

    public function test_can_show_AcademicSession(): void
    {
        $AcademicSession = AcademicSession::factory()->create();

        $response = $this->getJson('/api/academic_sessions/' . $AcademicSession->id);
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

    public function test_can_update_AcademicSession(): void
    {
        $AcademicSession = AcademicSession::factory()->create();
        $data = ['name' => 'Updated AcademicSession'];

        $response = $this->putJson('/api/academic_sessions/' . $AcademicSession->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('academic_sessions', $data);
    }

    public function test_can_delete_AcademicSession(): void
    {
        $AcademicSession = AcademicSession::factory()->create();

        $response = $this->deleteJson('/api/academic_sessions/' . $AcademicSession->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('academic_sessions', ['id' => $AcademicSession->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/academic_sessions', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
