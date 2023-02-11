<?php

it('can create a booking', function () {

    $response = $this->post('/api/bookings', [
        'room_id' => 2,
        'starts_at' => "2023/02/11",
        'ends_at' => "2023/02/13"
    ]);

    $response->assertStatus(200);
});

