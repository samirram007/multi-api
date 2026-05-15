<?php

namespace Modules\School\SubjectGroup\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\SubjectGroup\Models\SubjectGroup;

class SubjectGroupTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_subject_groups(): void
    {
        $response = $this->getJson('/api/subject_groups');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_SubjectGroup(): void
    {
        $data = ['name' => 'Test SubjectGroup'];

        $response = $this->postJson('/api/subject_groups', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('subject_groups', $data);
    }

    public function test_can_show_SubjectGroup(): void
    {
        $SubjectGroup = SubjectGroup::factory()->create();

        $response = $this->getJson('/api/subject_groups/' . $SubjectGroup->id);
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

    public function test_can_update_SubjectGroup(): void
    {
        $SubjectGroup = SubjectGroup::factory()->create();
        $data = ['name' => 'Updated SubjectGroup'];

        $response = $this->putJson('/api/subject_groups/' . $SubjectGroup->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('subject_groups', $data);
    }

    public function test_can_delete_SubjectGroup(): void
    {
        $SubjectGroup = SubjectGroup::factory()->create();

        $response = $this->deleteJson('/api/subject_groups/' . $SubjectGroup->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('subject_groups', ['id' => $SubjectGroup->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/subject_groups', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
