<?php

namespace Modules\App\App\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\App\App\Models\App;

class AppTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_apps(): void
    {
        $response = $this->getJson('/api/apps');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_App(): void
    {
        $data = ['name' => 'Test App'];

        $response = $this->postJson('/api/apps', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('apps', $data);
    }

    public function test_can_show_App(): void
    {
        $App = App::factory()->create();

        $response = $this->getJson('/api/apps/' . $App->id);
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

    public function test_can_update_App(): void
    {
        $App = App::factory()->create();
        $data = ['name' => 'Updated App'];

        $response = $this->putJson('/api/apps/' . $App->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('apps', $data);
    }

    public function test_can_delete_App(): void
    {
        $App = App::factory()->create();

        $response = $this->deleteJson('/api/apps/' . $App->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('apps', ['id' => $App->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/apps', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
