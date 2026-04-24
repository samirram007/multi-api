<?php

namespace App\Modules\School\Expense\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\Expense\Models\Expense;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_expenses(): void
    {
        $response = $this->getJson('/api/expenses');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Expense(): void
    {
        $data = ['name' => 'Test Expense'];

        $response = $this->postJson('/api/expenses', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expenses', $data);
    }

    public function test_can_show_Expense(): void
    {
        $Expense = Expense::factory()->create();

        $response = $this->getJson('/api/expenses/' . $Expense->id);
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

    public function test_can_update_Expense(): void
    {
        $Expense = Expense::factory()->create();
        $data = ['name' => 'Updated Expense'];

        $response = $this->putJson('/api/expenses/' . $Expense->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expenses', $data);
    }

    public function test_can_delete_Expense(): void
    {
        $Expense = Expense::factory()->create();

        $response = $this->deleteJson('/api/expenses/' . $Expense->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('expenses', ['id' => $Expense->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/expenses', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
