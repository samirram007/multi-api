<?php

namespace Modules\Payroll\Department\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Payroll\Department\Models\Department;
use Tests\Traits\HasTestTenant;

class DepartmentTest extends TestCase
{
    use RefreshDatabase, HasTestTenant;

    public function test_can_list_departments(): void
    {
        $response = $this->getJson('/api/departments', $this->withTenantHeader());
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Department(): void
    {
        $data = [
            'name' => 'Test Department',
            'code' => 'DEPT-001',
        ];

        $response = $this->postJson('/api/departments', $data, $this->withTenantHeader());
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('departments', $data);
    }

    public function test_can_show_Department(): void
    {
        $Department = Department::create([
            'name' => 'Existing Department',
            'code' => 'DEPT-EXIST',
        ]);

        $response = $this->getJson('/api/departments/' . $Department->id, $this->withTenantHeader());
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

    public function test_can_update_Department(): void
    {
        $Department = Department::create([
            'name' => 'Old Department',
            'code' => 'DEPT-OLD',
        ]);
        $data = ['name' => 'Updated Department', 'code' => 'DEPT-OLD'];

        $response = $this->putJson('/api/departments/' . $Department->id, $data, $this->withTenantHeader());
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('departments', $data);
    }

    public function test_can_delete_Department(): void
    {
        $Department = Department::create([
            'name' => 'To Delete',
            'code' => 'DEPT-DEL',
        ]);

        $response = $this->deleteJson('/api/departments/' . $Department->id, [], $this->withTenantHeader());
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('departments', ['id' => $Department->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/departments', [], $this->withTenantHeader());
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
