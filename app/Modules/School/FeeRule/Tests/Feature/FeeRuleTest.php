<?php

namespace App\Modules\School\FeeRule\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\FeeRule\Models\FeeRule;

class FeeRuleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_rules(): void
    {
        $response = $this->getJson('/api/fee_rules');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeRule(): void
    {
        $data = ['name' => 'Test FeeRule'];

        $response = $this->postJson('/api/fee_rules', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_rules', $data);
    }

    public function test_can_show_FeeRule(): void
    {
        $FeeRule = FeeRule::factory()->create();

        $response = $this->getJson('/api/fee_rules/' . $FeeRule->id);
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

    public function test_can_update_FeeRule(): void
    {
        $FeeRule = FeeRule::factory()->create();
        $data = ['name' => 'Updated FeeRule'];

        $response = $this->putJson('/api/fee_rules/' . $FeeRule->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_rules', $data);
    }

    public function test_can_delete_FeeRule(): void
    {
        $FeeRule = FeeRule::factory()->create();

        $response = $this->deleteJson('/api/fee_rules/' . $FeeRule->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_rules', ['id' => $FeeRule->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_rules', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
