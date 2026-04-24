<?php

namespace App\Modules\School\Student\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Student\Models\Student;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_students(): void
    {
        $response = $this->getJson('/api/students');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);
    }

    public function test_can_create_Student(): void
    {
        $data = ['name' => 'Test Student'];

        $response = $this->postJson('/api/students', $data);
        $response->assertStatus(201)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseHas('students', $data);
    }

    public function test_can_show_Student(): void
    {
        $Student = Student::factory()->create();

        $response = $this->getJson('/api/students/' . $Student->id);
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

    public function test_can_update_Student(): void
    {
        $Student = Student::factory()->create();
        $data = ['name' => 'Updated Student'];

        $response = $this->putJson('/api/students/' . $Student->id, $data);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseHas('students', $data);
    }

    public function test_can_delete_Student(): void
    {
        $Student = Student::factory()->create();

        $response = $this->deleteJson('/api/students/' . $Student->id);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseMissing('students', ['id' => $Student->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/students', []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
