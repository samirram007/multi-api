<?php

namespace App\Modules\School\FeeItemMonth\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\FeeItemMonth\Models\FeeItemMonth;

class FeeItemMonthTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_item_months(): void
    {
        $response = $this->getJson('/api/fee_item_months');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeItemMonth(): void
    {
        $data = ['name' => 'Test FeeItemMonth'];

        $response = $this->postJson('/api/fee_item_months', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_item_months', $data);
    }

    public function test_can_show_FeeItemMonth(): void
    {
        $FeeItemMonth = FeeItemMonth::factory()->create();

        $response = $this->getJson('/api/fee_item_months/' . $FeeItemMonth->id);
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

    public function test_can_update_FeeItemMonth(): void
    {
        $FeeItemMonth = FeeItemMonth::factory()->create();
        $data = ['name' => 'Updated FeeItemMonth'];

        $response = $this->putJson('/api/fee_item_months/' . $FeeItemMonth->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_item_months', $data);
    }

    public function test_can_delete_FeeItemMonth(): void
    {
        $FeeItemMonth = FeeItemMonth::factory()->create();

        $response = $this->deleteJson('/api/fee_item_months/' . $FeeItemMonth->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_item_months', ['id' => $FeeItemMonth->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_item_months', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
