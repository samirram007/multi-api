<?php

namespace App\Modules\Hotel\Amenities\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Hotel\Amenities\Models\Amenities;

class AmenitiesTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_amenities(): void
    {
        $response = $this->getJson('/api/amenities');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Amenities(): void
    {
        $data = ['name' => 'Test Amenities'];

        $response = $this->postJson('/api/amenities', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('amenities', $data);
    }

    public function test_can_show_Amenities(): void
    {
        $Amenities = Amenities::factory()->create();

        $response = $this->getJson('/api/amenities/' . $Amenities->id);
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

    public function test_can_update_Amenities(): void
    {
        $Amenities = Amenities::factory()->create();
        $data = ['name' => 'Updated Amenities'];

        $response = $this->putJson('/api/amenities/' . $Amenities->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('amenities', $data);
    }

    public function test_can_delete_Amenities(): void
    {
        $Amenities = Amenities::factory()->create();

        $response = $this->deleteJson('/api/amenities/' . $Amenities->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('amenities', ['id' => $Amenities->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/amenities', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
