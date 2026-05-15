<?php

namespace Modules\School\Promotion\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Promotion\Models\Promotion;

class PromotionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_promotions(): void
    {
        $response = $this->getJson('/api/promotions');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Promotion(): void
    {
        $data = ['name' => 'Test Promotion'];

        $response = $this->postJson('/api/promotions', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('promotions', $data);
    }

    public function test_can_show_Promotion(): void
    {
        $Promotion = Promotion::factory()->create();

        $response = $this->getJson('/api/promotions/' . $Promotion->id);
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

    public function test_can_update_Promotion(): void
    {
        $Promotion = Promotion::factory()->create();
        $data = ['name' => 'Updated Promotion'];

        $response = $this->putJson('/api/promotions/' . $Promotion->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('promotions', $data);
    }

    public function test_can_delete_Promotion(): void
    {
        $Promotion = Promotion::factory()->create();

        $response = $this->deleteJson('/api/promotions/' . $Promotion->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('promotions', ['id' => $Promotion->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/promotions', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
