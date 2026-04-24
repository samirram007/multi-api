<?php

namespace App\Modules\School\ExaminationStandard\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\ExaminationStandard\Models\ExaminationStandard;

class ExaminationStandardTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_examination_standards(): void
    {
        $response = $this->getJson('/api/examination_standards');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_ExaminationStandard(): void
    {
        $data = ['name' => 'Test ExaminationStandard'];

        $response = $this->postJson('/api/examination_standards', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_standards', $data);
    }

    public function test_can_show_ExaminationStandard(): void
    {
        $ExaminationStandard = ExaminationStandard::factory()->create();

        $response = $this->getJson('/api/examination_standards/' . $ExaminationStandard->id);
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

    public function test_can_update_ExaminationStandard(): void
    {
        $ExaminationStandard = ExaminationStandard::factory()->create();
        $data = ['name' => 'Updated ExaminationStandard'];

        $response = $this->putJson('/api/examination_standards/' . $ExaminationStandard->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_standards', $data);
    }

    public function test_can_delete_ExaminationStandard(): void
    {
        $ExaminationStandard = ExaminationStandard::factory()->create();

        $response = $this->deleteJson('/api/examination_standards/' . $ExaminationStandard->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('examination_standards', ['id' => $ExaminationStandard->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/examination_standards', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
