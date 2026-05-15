<?php

namespace Modules\School\Section\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Section\Models\Section;

class SectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_sections(): void
    {
        $response = $this->getJson('/api/sections');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Section(): void
    {
        $data = ['name' => 'Test Section'];

        $response = $this->postJson('/api/sections', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('sections', $data);
    }

    public function test_can_show_Section(): void
    {
        $Section = Section::factory()->create();

        $response = $this->getJson('/api/sections/' . $Section->id);
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

    public function test_can_update_Section(): void
    {
        $Section = Section::factory()->create();
        $data = ['name' => 'Updated Section'];

        $response = $this->putJson('/api/sections/' . $Section->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('sections', $data);
    }

    public function test_can_delete_Section(): void
    {
        $Section = Section::factory()->create();

        $response = $this->deleteJson('/api/sections/' . $Section->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('sections', ['id' => $Section->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/sections', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
