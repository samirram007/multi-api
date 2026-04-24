<?php

namespace App\Modules\School\ExpenseGroup\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\ExpenseGroup\Models\ExpenseGroup;

class ExpenseGroupTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_expense_groups(): void
    {
        $response = $this->getJson('/api/expense_groups');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_ExpenseGroup(): void
    {
        $data = ['name' => 'Test ExpenseGroup'];

        $response = $this->postJson('/api/expense_groups', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expense_groups', $data);
    }

    public function test_can_show_ExpenseGroup(): void
    {
        $ExpenseGroup = ExpenseGroup::factory()->create();

        $response = $this->getJson('/api/expense_groups/' . $ExpenseGroup->id);
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

    public function test_can_update_ExpenseGroup(): void
    {
        $ExpenseGroup = ExpenseGroup::factory()->create();
        $data = ['name' => 'Updated ExpenseGroup'];

        $response = $this->putJson('/api/expense_groups/' . $ExpenseGroup->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('expense_groups', $data);
    }

    public function test_can_delete_ExpenseGroup(): void
    {
        $ExpenseGroup = ExpenseGroup::factory()->create();

        $response = $this->deleteJson('/api/expense_groups/' . $ExpenseGroup->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('expense_groups', ['id' => $ExpenseGroup->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/expense_groups', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
