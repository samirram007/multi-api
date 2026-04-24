<?php

namespace App\Modules\School\FeeTemplate\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\FeeTemplate\Models\FeeTemplate;

class FeeTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_templates(): void
    {
        $response = $this->getJson('/api/fee_templates');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeTemplate(): void
    {
        $data = ['name' => 'Test FeeTemplate'];

        $response = $this->postJson('/api/fee_templates', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_templates', $data);
    }

    public function test_can_show_FeeTemplate(): void
    {
        $FeeTemplate = FeeTemplate::factory()->create();

        $response = $this->getJson('/api/fee_templates/' . $FeeTemplate->id);
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

    public function test_can_update_FeeTemplate(): void
    {
        $FeeTemplate = FeeTemplate::factory()->create();
        $data = ['name' => 'Updated FeeTemplate'];

        $response = $this->putJson('/api/fee_templates/' . $FeeTemplate->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_templates', $data);
    }

    public function test_can_delete_FeeTemplate(): void
    {
        $FeeTemplate = FeeTemplate::factory()->create();

        $response = $this->deleteJson('/api/fee_templates/' . $FeeTemplate->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_templates', ['id' => $FeeTemplate->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_templates', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
