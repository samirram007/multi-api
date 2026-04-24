<?php

namespace App\Modules\Pathology\Test\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Pathology\Test\Models\Test;

class TestTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tests(): void
    {
        $response = $this->getJson('/api/tests');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Test(): void
    {
        $data = ['name' => 'Test Test'];

        $response = $this->postJson('/api/tests', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tests', $data);
    }

    public function test_can_show_Test(): void
    {
        $Test = Test::factory()->create();

        $response = $this->getJson('/api/tests/' . $Test->id);
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

    public function test_can_update_Test(): void
    {
        $Test = Test::factory()->create();
        $data = ['name' => 'Updated Test'];

        $response = $this->putJson('/api/tests/' . $Test->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('tests', $data);
    }

    public function test_can_delete_Test(): void
    {
        $Test = Test::factory()->create();

        $response = $this->deleteJson('/api/tests/' . $Test->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('tests', ['id' => $Test->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/tests', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
