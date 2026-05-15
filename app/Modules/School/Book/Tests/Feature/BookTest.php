<?php

namespace Modules\School\Book\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Book\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_books(): void
    {
        $response = $this->getJson('/api/books');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Book(): void
    {
        $data = ['name' => 'Test Book'];

        $response = $this->postJson('/api/books', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('books', $data);
    }

    public function test_can_show_Book(): void
    {
        $Book = Book::factory()->create();

        $response = $this->getJson('/api/books/' . $Book->id);
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

    public function test_can_update_Book(): void
    {
        $Book = Book::factory()->create();
        $data = ['name' => 'Updated Book'];

        $response = $this->putJson('/api/books/' . $Book->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('books', $data);
    }

    public function test_can_delete_Book(): void
    {
        $Book = Book::factory()->create();

        $response = $this->deleteJson('/api/books/' . $Book->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('books', ['id' => $Book->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/books', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
