<?php

namespace Modules\School\ExpenseItem\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\ExpenseItem\Models\ExpenseItem;

class ExpenseItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_expense_items(): void
    {
        $response = $this->getJson('/api/expense_items');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_ExpenseItem(): void
    {
        $data = ['name' => 'Test ExpenseItem'];

        $response = $this->postJson('/api/expense_items', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expense_items', $data);
    }

    public function test_can_show_ExpenseItem(): void
    {
        $ExpenseItem = ExpenseItem::factory()->create();

        $response = $this->getJson('/api/expense_items/' . $ExpenseItem->id);
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

    public function test_can_update_ExpenseItem(): void
    {
        $ExpenseItem = ExpenseItem::factory()->create();
        $data = ['name' => 'Updated ExpenseItem'];

        $response = $this->putJson('/api/expense_items/' . $ExpenseItem->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expense_items', $data);
    }

    public function test_can_delete_ExpenseItem(): void
    {
        $ExpenseItem = ExpenseItem::factory()->create();

        $response = $this->deleteJson('/api/expense_items/' . $ExpenseItem->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('expense_items', ['id' => $ExpenseItem->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/expense_items', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
