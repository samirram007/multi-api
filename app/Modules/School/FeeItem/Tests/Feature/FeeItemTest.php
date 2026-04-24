<?php

namespace App\Modules\School\FeeItem\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\FeeItem\Models\FeeItem;

class FeeItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_items(): void
    {
        $response = $this->getJson('/api/fee_items');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeItem(): void
    {
        $data = ['name' => 'Test FeeItem'];

        $response = $this->postJson('/api/fee_items', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_items', $data);
    }

    public function test_can_show_FeeItem(): void
    {
        $FeeItem = FeeItem::factory()->create();

        $response = $this->getJson('/api/fee_items/' . $FeeItem->id);
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

    public function test_can_update_FeeItem(): void
    {
        $FeeItem = FeeItem::factory()->create();
        $data = ['name' => 'Updated FeeItem'];

        $response = $this->putJson('/api/fee_items/' . $FeeItem->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_items', $data);
    }

    public function test_can_delete_FeeItem(): void
    {
        $FeeItem = FeeItem::factory()->create();

        $response = $this->deleteJson('/api/fee_items/' . $FeeItem->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_items', ['id' => $FeeItem->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_items', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
