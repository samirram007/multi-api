<?php

namespace App\Modules\School\Admission\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Admission\Models\Admission;

class AdmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_admissions(): void
    {
        $response = $this->getJson('/api/admissions');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Admission(): void
    {
        $data = ['name' => 'Test Admission'];

        $response = $this->postJson('/api/admissions', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('admissions', $data);
    }

    public function test_can_show_Admission(): void
    {
        $Admission = Admission::factory()->create();

        $response = $this->getJson('/api/admissions/' . $Admission->id);
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

    public function test_can_update_Admission(): void
    {
        $Admission = Admission::factory()->create();
        $data = ['name' => 'Updated Admission'];

        $response = $this->putJson('/api/admissions/' . $Admission->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('admissions', $data);
    }

    public function test_can_delete_Admission(): void
    {
        $Admission = Admission::factory()->create();

        $response = $this->deleteJson('/api/admissions/' . $Admission->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('admissions', ['id' => $Admission->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/admissions', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
