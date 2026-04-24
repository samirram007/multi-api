<?php

namespace App\Modules\Maintenance\Backup\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Maintenance\Backup\Models\Backup;

class BackupTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_backups(): void
    {
        $response = $this->getJson('/api/backups');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Backup(): void
    {
        $data = ['name' => 'Test Backup'];

        $response = $this->postJson('/api/backups', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('backups', $data);
    }

    public function test_can_show_Backup(): void
    {
        $Backup = Backup::factory()->create();

        $response = $this->getJson('/api/backups/' . $Backup->id);
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

    public function test_can_update_Backup(): void
    {
        $Backup = Backup::factory()->create();
        $data = ['name' => 'Updated Backup'];

        $response = $this->putJson('/api/backups/' . $Backup->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('backups', $data);
    }

    public function test_can_delete_Backup(): void
    {
        $Backup = Backup::factory()->create();

        $response = $this->deleteJson('/api/backups/' . $Backup->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('backups', ['id' => $Backup->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/backups', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
