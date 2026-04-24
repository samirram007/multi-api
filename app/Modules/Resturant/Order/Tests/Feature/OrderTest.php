<?php

namespace App\Modules\Resturant\Order\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Resturant\Order\Models\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_orders(): void
    {
        $response = $this->getJson('/api/orders');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Order(): void
    {
        $data = ['name' => 'Test Order'];

        $response = $this->postJson('/api/orders', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('orders', $data);
    }

    public function test_can_show_Order(): void
    {
        $Order = Order::factory()->create();

        $response = $this->getJson('/api/orders/' . $Order->id);
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

    public function test_can_update_Order(): void
    {
        $Order = Order::factory()->create();
        $data = ['name' => 'Updated Order'];

        $response = $this->putJson('/api/orders/' . $Order->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('orders', $data);
    }

    public function test_can_delete_Order(): void
    {
        $Order = Order::factory()->create();

        $response = $this->deleteJson('/api/orders/' . $Order->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('orders', ['id' => $Order->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/orders', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
