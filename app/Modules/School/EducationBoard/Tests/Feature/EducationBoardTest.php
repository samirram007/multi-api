<?php

namespace App\Modules\School\EducationBoard\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\EducationBoard\Models\EducationBoard;

class EducationBoardTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_education_boards(): void
    {
        $response = $this->getJson('/api/education_boards');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_EducationBoard(): void
    {
        $data = ['name' => 'Test EducationBoard'];

        $response = $this->postJson('/api/education_boards', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('education_boards', $data);
    }

    public function test_can_show_EducationBoard(): void
    {
        $EducationBoard = EducationBoard::factory()->create();

        $response = $this->getJson('/api/education_boards/' . $EducationBoard->id);
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

    public function test_can_update_EducationBoard(): void
    {
        $EducationBoard = EducationBoard::factory()->create();
        $data = ['name' => 'Updated EducationBoard'];

        $response = $this->putJson('/api/education_boards/' . $EducationBoard->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('education_boards', $data);
    }

    public function test_can_delete_EducationBoard(): void
    {
        $EducationBoard = EducationBoard::factory()->create();

        $response = $this->deleteJson('/api/education_boards/' . $EducationBoard->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('education_boards', ['id' => $EducationBoard->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/education_boards', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
