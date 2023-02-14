<?php

use App\Models\Room;
use Illuminate\Foundation\Testing\WithFaker;

uses(WithFaker::class);

beforeEach(function () {

    $this->room = Room::factory()->create([
        'name' => $this->faker->word,
        'capacity' => random_int(1, 10)
    ]);
});

it('can create a booking', function () {

    $response = $this->post('/api/bookings', [
        'room_id' => $this->room->id,
        'starts_at' => date($format = 'Y/m/d'),
        'ends_at' => date($format = 'Y/m/d')
    ]);

    $response->assertStatus(200);
});
