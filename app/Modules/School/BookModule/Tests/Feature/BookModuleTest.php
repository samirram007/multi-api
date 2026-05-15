<?php

namespace Modules\School\BookModule\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\BookModule\Models\BookModule;

class BookModuleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_book_modules(): void
    {
        $response = $this->getJson('/api/book_modules');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_BookModule(): void
    {
        $data = ['name' => 'Test BookModule'];

        $response = $this->postJson('/api/book_modules', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('book_modules', $data);
    }

    public function test_can_show_BookModule(): void
    {
        $BookModule = BookModule::factory()->create();

        $response = $this->getJson('/api/book_modules/' . $BookModule->id);
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

    public function test_can_update_BookModule(): void
    {
        $BookModule = BookModule::factory()->create();
        $data = ['name' => 'Updated BookModule'];

        $response = $this->putJson('/api/book_modules/' . $BookModule->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('book_modules', $data);
    }

    public function test_can_delete_BookModule(): void
    {
        $BookModule = BookModule::factory()->create();

        $response = $this->deleteJson('/api/book_modules/' . $BookModule->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('book_modules', ['id' => $BookModule->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/book_modules', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
