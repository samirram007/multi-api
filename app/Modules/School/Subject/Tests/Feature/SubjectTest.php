<?php

namespace Modules\School\Subject\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Subject\Models\Subject;

class SubjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_subjects(): void
    {
        $response = $this->getJson('/api/subjects');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Subject(): void
    {
        $data = ['name' => 'Test Subject'];

        $response = $this->postJson('/api/subjects', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('subjects', $data);
    }

    public function test_can_show_Subject(): void
    {
        $Subject = Subject::factory()->create();

        $response = $this->getJson('/api/subjects/' . $Subject->id);
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

    public function test_can_update_Subject(): void
    {
        $Subject = Subject::factory()->create();
        $data = ['name' => 'Updated Subject'];

        $response = $this->putJson('/api/subjects/' . $Subject->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('subjects', $data);
    }

    public function test_can_delete_Subject(): void
    {
        $Subject = Subject::factory()->create();

        $response = $this->deleteJson('/api/subjects/' . $Subject->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('subjects', ['id' => $Subject->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/subjects', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
