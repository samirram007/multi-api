<?php

namespace Modules\School\BookChapter\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\BookChapter\Models\BookChapter;

class BookChapterTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_book_chapters(): void
    {
        $response = $this->getJson('/api/book_chapters');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_BookChapter(): void
    {
        $data = ['name' => 'Test BookChapter'];

        $response = $this->postJson('/api/book_chapters', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('book_chapters', $data);
    }

    public function test_can_show_BookChapter(): void
    {
        $BookChapter = BookChapter::factory()->create();

        $response = $this->getJson('/api/book_chapters/' . $BookChapter->id);
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

    public function test_can_update_BookChapter(): void
    {
        $BookChapter = BookChapter::factory()->create();
        $data = ['name' => 'Updated BookChapter'];

        $response = $this->putJson('/api/book_chapters/' . $BookChapter->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('book_chapters', $data);
    }

    public function test_can_delete_BookChapter(): void
    {
        $BookChapter = BookChapter::factory()->create();

        $response = $this->deleteJson('/api/book_chapters/' . $BookChapter->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('book_chapters', ['id' => $BookChapter->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/book_chapters', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
