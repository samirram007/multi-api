<?php

namespace App\Modules\School\ExaminationResult\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\ExaminationResult\Models\ExaminationResult;

class ExaminationResultTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_examination_results(): void
    {
        $response = $this->getJson('/api/examination_results');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_ExaminationResult(): void
    {
        $data = ['name' => 'Test ExaminationResult'];

        $response = $this->postJson('/api/examination_results', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_results', $data);
    }

    public function test_can_show_ExaminationResult(): void
    {
        $ExaminationResult = ExaminationResult::factory()->create();

        $response = $this->getJson('/api/examination_results/' . $ExaminationResult->id);
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

    public function test_can_update_ExaminationResult(): void
    {
        $ExaminationResult = ExaminationResult::factory()->create();
        $data = ['name' => 'Updated ExaminationResult'];

        $response = $this->putJson('/api/examination_results/' . $ExaminationResult->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_results', $data);
    }

    public function test_can_delete_ExaminationResult(): void
    {
        $ExaminationResult = ExaminationResult::factory()->create();

        $response = $this->deleteJson('/api/examination_results/' . $ExaminationResult->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('examination_results', ['id' => $ExaminationResult->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/examination_results', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
