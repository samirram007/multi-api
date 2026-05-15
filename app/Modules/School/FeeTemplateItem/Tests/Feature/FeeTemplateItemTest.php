<?php

namespace Modules\School\FeeTemplateItem\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\FeeTemplateItem\Models\FeeTemplateItem;

class FeeTemplateItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_template_items(): void
    {
        $response = $this->getJson('/api/fee_template_items');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeTemplateItem(): void
    {
        $data = ['name' => 'Test FeeTemplateItem'];

        $response = $this->postJson('/api/fee_template_items', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_template_items', $data);
    }

    public function test_can_show_FeeTemplateItem(): void
    {
        $FeeTemplateItem = FeeTemplateItem::factory()->create();

        $response = $this->getJson('/api/fee_template_items/' . $FeeTemplateItem->id);
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

    public function test_can_update_FeeTemplateItem(): void
    {
        $FeeTemplateItem = FeeTemplateItem::factory()->create();
        $data = ['name' => 'Updated FeeTemplateItem'];

        $response = $this->putJson('/api/fee_template_items/' . $FeeTemplateItem->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_template_items', $data);
    }

    public function test_can_delete_FeeTemplateItem(): void
    {
        $FeeTemplateItem = FeeTemplateItem::factory()->create();

        $response = $this->deleteJson('/api/fee_template_items/' . $FeeTemplateItem->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_template_items', ['id' => $FeeTemplateItem->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_template_items', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
