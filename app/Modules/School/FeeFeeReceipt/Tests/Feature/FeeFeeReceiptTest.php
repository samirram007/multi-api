<?php

namespace Modules\School\FeeFeeReceipt\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\FeeFeeReceipt\Models\FeeFeeReceipt;

class FeeFeeReceiptTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_fee_receipts(): void
    {
        $response = $this->getJson('/api/fee_fee_receipts');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeFeeReceipt(): void
    {
        $data = ['name' => 'Test FeeFeeReceipt'];

        $response = $this->postJson('/api/fee_fee_receipts', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_fee_receipts', $data);
    }

    public function test_can_show_FeeFeeReceipt(): void
    {
        $FeeFeeReceipt = FeeFeeReceipt::factory()->create();

        $response = $this->getJson('/api/fee_fee_receipts/' . $FeeFeeReceipt->id);
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

    public function test_can_update_FeeFeeReceipt(): void
    {
        $FeeFeeReceipt = FeeFeeReceipt::factory()->create();
        $data = ['name' => 'Updated FeeFeeReceipt'];

        $response = $this->putJson('/api/fee_fee_receipts/' . $FeeFeeReceipt->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_fee_receipts', $data);
    }

    public function test_can_delete_FeeFeeReceipt(): void
    {
        $FeeFeeReceipt = FeeFeeReceipt::factory()->create();

        $response = $this->deleteJson('/api/fee_fee_receipts/' . $FeeFeeReceipt->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_fee_receipts', ['id' => $FeeFeeReceipt->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_fee_receipts', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
