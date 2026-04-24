<?php

namespace App\Modules\School\ExpenseHead\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\ExpenseHead\Models\ExpenseHead;

class ExpenseHeadTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_expense_heads(): void
    {
        $response = $this->getJson('/api/expense_heads');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_ExpenseHead(): void
    {
        $data = ['name' => 'Test ExpenseHead'];

        $response = $this->postJson('/api/expense_heads', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expense_heads', $data);
    }

    public function test_can_show_ExpenseHead(): void
    {
        $ExpenseHead = ExpenseHead::factory()->create();

        $response = $this->getJson('/api/expense_heads/' . $ExpenseHead->id);
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

    public function test_can_update_ExpenseHead(): void
    {
        $ExpenseHead = ExpenseHead::factory()->create();
        $data = ['name' => 'Updated ExpenseHead'];

        $response = $this->putJson('/api/expense_heads/' . $ExpenseHead->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expense_heads', $data);
    }

    public function test_can_delete_ExpenseHead(): void
    {
        $ExpenseHead = ExpenseHead::factory()->create();

        $response = $this->deleteJson('/api/expense_heads/' . $ExpenseHead->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('expense_heads', ['id' => $ExpenseHead->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/expense_heads', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
