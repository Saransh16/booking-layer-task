<?php

use Illuminate\Foundation\Testing\WithFaker;

uses(WithFaker::class);

it('can add a room validation error', function () {

    $response = $this->post('/api/rooms');

    $response->assertStatus(422);
});

it('can add a room success', function () {

    $response = $this->post('/api/rooms', [
        'name' => $this->faker->word,
        'capacity' => random_int(1, 20)
    ]);

    $response->assertStatus(200);
});
