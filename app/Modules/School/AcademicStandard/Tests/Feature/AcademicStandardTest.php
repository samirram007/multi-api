<?php

namespace App\Modules\School\AcademicStandard\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\AcademicStandard\Models\AcademicStandard;

class AcademicStandardTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_academic_standards(): void
    {
        $response = $this->getJson('/api/academic_standards');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_AcademicStandard(): void
    {
        $data = ['name' => 'Test AcademicStandard'];

        $response = $this->postJson('/api/academic_standards', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('academic_standards', $data);
    }

    public function test_can_show_AcademicStandard(): void
    {
        $AcademicStandard = AcademicStandard::factory()->create();

        $response = $this->getJson('/api/academic_standards/' . $AcademicStandard->id);
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

    public function test_can_update_AcademicStandard(): void
    {
        $AcademicStandard = AcademicStandard::factory()->create();
        $data = ['name' => 'Updated AcademicStandard'];

        $response = $this->putJson('/api/academic_standards/' . $AcademicStandard->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('academic_standards', $data);
    }

    public function test_can_delete_AcademicStandard(): void
    {
        $AcademicStandard = AcademicStandard::factory()->create();

        $response = $this->deleteJson('/api/academic_standards/' . $AcademicStandard->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('academic_standards', ['id' => $AcademicStandard->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/academic_standards', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
