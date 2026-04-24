<?php

namespace App\Modules\School\Fee\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Fee\Models\Fee;

class FeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fees(): void
    {
        $response = $this->getJson('/api/fees');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Fee(): void
    {
        $data = ['name' => 'Test Fee'];

        $response = $this->postJson('/api/fees', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fees', $data);
    }

    public function test_can_show_Fee(): void
    {
        $Fee = Fee::factory()->create();

        $response = $this->getJson('/api/fees/' . $Fee->id);
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

    public function test_can_update_Fee(): void
    {
        $Fee = Fee::factory()->create();
        $data = ['name' => 'Updated Fee'];

        $response = $this->putJson('/api/fees/' . $Fee->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fees', $data);
    }

    public function test_can_delete_Fee(): void
    {
        $Fee = Fee::factory()->create();

        $response = $this->deleteJson('/api/fees/' . $Fee->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fees', ['id' => $Fee->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fees', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
