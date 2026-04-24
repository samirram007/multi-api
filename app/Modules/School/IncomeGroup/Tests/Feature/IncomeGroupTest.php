<?php

namespace App\Modules\School\IncomeGroup\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\IncomeGroup\Models\IncomeGroup;

class IncomeGroupTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_income_groups(): void
    {
        $response = $this->getJson('/api/income_groups');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_IncomeGroup(): void
    {
        $data = ['name' => 'Test IncomeGroup'];

        $response = $this->postJson('/api/income_groups', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('income_groups', $data);
    }

    public function test_can_show_IncomeGroup(): void
    {
        $IncomeGroup = IncomeGroup::factory()->create();

        $response = $this->getJson('/api/income_groups/' . $IncomeGroup->id);
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

    public function test_can_update_IncomeGroup(): void
    {
        $IncomeGroup = IncomeGroup::factory()->create();
        $data = ['name' => 'Updated IncomeGroup'];

        $response = $this->putJson('/api/income_groups/' . $IncomeGroup->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('income_groups', $data);
    }

    public function test_can_delete_IncomeGroup(): void
    {
        $IncomeGroup = IncomeGroup::factory()->create();

        $response = $this->deleteJson('/api/income_groups/' . $IncomeGroup->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('income_groups', ['id' => $IncomeGroup->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/income_groups', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
