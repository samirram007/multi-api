<?php

namespace App\Modules\Document\SharedDocument\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Document\SharedDocument\Models\SharedDocument;

class SharedDocumentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_shared_documents(): void
    {
        $response = $this->getJson('/api/shared_documents');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);
    }

    public function test_can_create_SharedDocument(): void
    {
        $data = ['name' => 'Test SharedDocument'];

        $response = $this->postJson('/api/shared_documents', $data);
        $response->assertStatus(201)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseHas('shared_documents', $data);
    }

    public function test_can_show_SharedDocument(): void
    {
        $SharedDocument = SharedDocument::factory()->create();

        $response = $this->getJson('/api/shared_documents/' . $SharedDocument->id);
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

    public function test_can_update_SharedDocument(): void
    {
        $SharedDocument = SharedDocument::factory()->create();
        $data = ['name' => 'Updated SharedDocument'];

        $response = $this->putJson('/api/shared_documents/' . $SharedDocument->id, $data);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseHas('shared_documents', $data);
    }

    public function test_can_delete_SharedDocument(): void
    {
        $SharedDocument = SharedDocument::factory()->create();

        $response = $this->deleteJson('/api/shared_documents/' . $SharedDocument->id);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'code',
                'message'
            ]);

        $this->assertDatabaseMissing('shared_documents', ['id' => $SharedDocument->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/shared_documents', []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
