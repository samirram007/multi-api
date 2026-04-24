<?php

namespace App\Modules\School\ExaminationType\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\ExaminationType\Models\ExaminationType;

class ExaminationTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_examination_types(): void
    {
        $response = $this->getJson('/api/examination_types');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_ExaminationType(): void
    {
        $data = ['name' => 'Test ExaminationType'];

        $response = $this->postJson('/api/examination_types', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_types', $data);
    }

    public function test_can_show_ExaminationType(): void
    {
        $ExaminationType = ExaminationType::factory()->create();

        $response = $this->getJson('/api/examination_types/' . $ExaminationType->id);
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

    public function test_can_update_ExaminationType(): void
    {
        $ExaminationType = ExaminationType::factory()->create();
        $data = ['name' => 'Updated ExaminationType'];

        $response = $this->putJson('/api/examination_types/' . $ExaminationType->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_types', $data);
    }

    public function test_can_delete_ExaminationType(): void
    {
        $ExaminationType = ExaminationType::factory()->create();

        $response = $this->deleteJson('/api/examination_types/' . $ExaminationType->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('examination_types', ['id' => $ExaminationType->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/examination_types', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
