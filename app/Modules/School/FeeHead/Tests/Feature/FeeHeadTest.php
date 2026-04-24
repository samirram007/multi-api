<?php

namespace App\Modules\School\FeeHead\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\School\FeeHead\Models\FeeHead;

class FeeHeadTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_fee_heads(): void
    {
        $response = $this->getJson('/api/fee_heads');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_FeeHead(): void
    {
        $data = ['name' => 'Test FeeHead'];

        $response = $this->postJson('/api/fee_heads', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_heads', $data);
    }

    public function test_can_show_FeeHead(): void
    {
        $FeeHead = FeeHead::factory()->create();

        $response = $this->getJson('/api/fee_heads/' . $FeeHead->id);
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

    public function test_can_update_FeeHead(): void
    {
        $FeeHead = FeeHead::factory()->create();
        $data = ['name' => 'Updated FeeHead'];

        $response = $this->putJson('/api/fee_heads/' . $FeeHead->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('fee_heads', $data);
    }

    public function test_can_delete_FeeHead(): void
    {
        $FeeHead = FeeHead::factory()->create();

        $response = $this->deleteJson('/api/fee_heads/' . $FeeHead->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('fee_heads', ['id' => $FeeHead->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/fee_heads', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
