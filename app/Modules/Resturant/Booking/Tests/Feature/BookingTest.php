<?php

namespace App\Modules\Resturant\Booking\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Resturant\Booking\Models\Booking;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_bookings(): void
    {
        $response = $this->getJson('/api/bookings');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);
    }

    public function test_can_create_Booking(): void
    {
        $data = ['name' => 'Test Booking'];

        $response = $this->postJson('/api/bookings', $data);
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('bookings', $data);
    }

    public function test_can_show_Booking(): void
    {
        $Booking = Booking::factory()->create();

        $response = $this->getJson('/api/bookings/' . $Booking->id);
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

    public function test_can_update_Booking(): void
    {
        $Booking = Booking::factory()->create();
        $data = ['name' => 'Updated Booking'];

        $response = $this->putJson('/api/bookings/' . $Booking->id, $data);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseHas('bookings', $data);
    }

    public function test_can_delete_Booking(): void
    {
        $Booking = Booking::factory()->create();

        $response = $this->deleteJson('/api/bookings/' . $Booking->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'code',
                     'message'
                 ]);

        $this->assertDatabaseMissing('bookings', ['id' => $Booking->id]);
    }

    public function test_validation_errors_on_create(): void
    {
        $response = $this->postJson('/api/bookings', []);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }
}
