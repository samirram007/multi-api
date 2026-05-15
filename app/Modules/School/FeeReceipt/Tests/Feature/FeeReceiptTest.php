<?php

namespace Modules\School\FeeReceipt\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\FeeReceipt\Models\FeeReceipt;

class FeeReceiptTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_receipts(): void
    {
        $response = $this->getJson('/api/fee_receipts');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeReceipt(): void
    {
        $data = ['name' => 'Test FeeReceipt'];

        $response = $this->postJson('/api/fee_receipts', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_receipts', $data);
    }

    public function test_can_show_FeeReceipt(): void
    {
        $FeeReceipt = FeeReceipt::factory()->create();

        $response = $this->getJson('/api/fee_receipts/' . $FeeReceipt->id);
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

    public function test_can_update_FeeReceipt(): void
    {
        $FeeReceipt = FeeReceipt::factory()->create();
        $data = ['name' => 'Updated FeeReceipt'];

        $response = $this->putJson('/api/fee_receipts/' . $FeeReceipt->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_receipts', $data);
    }

    public function test_can_delete_FeeReceipt(): void
    {
        $FeeReceipt = FeeReceipt::factory()->create();

        $response = $this->deleteJson('/api/fee_receipts/' . $FeeReceipt->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_receipts', ['id' => $FeeReceipt->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_receipts', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
