<?php

namespace Modules\School\Month\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Month\Models\Month;

class MonthTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_months(): void
    {
        $response = $this->getJson('/api/months');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Month(): void
    {
        $data = ['name' => 'Test Month'];

        $response = $this->postJson('/api/months', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('months', $data);
    }

    public function test_can_show_Month(): void
    {
        $Month = Month::factory()->create();

        $response = $this->getJson('/api/months/' . $Month->id);
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

    public function test_can_update_Month(): void
    {
        $Month = Month::factory()->create();
        $data = ['name' => 'Updated Month'];

        $response = $this->putJson('/api/months/' . $Month->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('months', $data);
    }

    public function test_can_delete_Month(): void
    {
        $Month = Month::factory()->create();

        $response = $this->deleteJson('/api/months/' . $Month->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('months', ['id' => $Month->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/months', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
