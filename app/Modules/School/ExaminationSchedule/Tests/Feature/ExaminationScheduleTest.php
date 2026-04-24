<?php

namespace App\Modules\School\ExaminationSchedule\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\ExaminationSchedule\Models\ExaminationSchedule;

class ExaminationScheduleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_examination_schedules(): void
    {
        $response = $this->getJson('/api/examination_schedules');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_ExaminationSchedule(): void
    {
        $data = ['name' => 'Test ExaminationSchedule'];

        $response = $this->postJson('/api/examination_schedules', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_schedules', $data);
    }

    public function test_can_show_ExaminationSchedule(): void
    {
        $ExaminationSchedule = ExaminationSchedule::factory()->create();

        $response = $this->getJson('/api/examination_schedules/' . $ExaminationSchedule->id);
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

    public function test_can_update_ExaminationSchedule(): void
    {
        $ExaminationSchedule = ExaminationSchedule::factory()->create();
        $data = ['name' => 'Updated ExaminationSchedule'];

        $response = $this->putJson('/api/examination_schedules/' . $ExaminationSchedule->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examination_schedules', $data);
    }

    public function test_can_delete_ExaminationSchedule(): void
    {
        $ExaminationSchedule = ExaminationSchedule::factory()->create();

        $response = $this->deleteJson('/api/examination_schedules/' . $ExaminationSchedule->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('examination_schedules', ['id' => $ExaminationSchedule->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/examination_schedules', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
