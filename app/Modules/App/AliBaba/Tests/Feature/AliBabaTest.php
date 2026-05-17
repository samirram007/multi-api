<?php

namespace Modules\App\AliBaba\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\App\AliBaba\Models\AliBaba;

class AliBabaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_ali_babas(): void
    {
        $response = $this->getJson('/api/ali_babas');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_AliBaba(): void
    {
        $data = [
            'name' => 'Test AliBaba',
            'code' => 'TST' . rand(100, 999),
        ];

        $response = $this->postJson('/api/ali_babas', $data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('ali_babas', $data);
    }
}
