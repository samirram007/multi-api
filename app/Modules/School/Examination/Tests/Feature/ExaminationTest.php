<?php

namespace App\Modules\School\Examination\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Examination\Models\Examination;

class ExaminationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_examinations(): void
    {
        $response = $this->getJson('/api/examinations');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Examination(): void
    {
        $data = ['name' => 'Test Examination'];

        $response = $this->postJson('/api/examinations', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examinations', $data);
    }

    public function test_can_show_Examination(): void
    {
        $Examination = Examination::factory()->create();

        $response = $this->getJson('/api/examinations/' . $Examination->id);
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

    public function test_can_update_Examination(): void
    {
        $Examination = Examination::factory()->create();
        $data = ['name' => 'Updated Examination'];

        $response = $this->putJson('/api/examinations/' . $Examination->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('examinations', $data);
    }

    public function test_can_delete_Examination(): void
    {
        $Examination = Examination::factory()->create();

        $response = $this->deleteJson('/api/examinations/' . $Examination->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('examinations', ['id' => $Examination->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/examinations', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
