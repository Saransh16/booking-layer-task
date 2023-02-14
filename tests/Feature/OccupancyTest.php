<?php

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Carbon\CarbonPeriod;
use Illuminate\Foundation\Testing\WithFaker;

uses(WithFaker::class);

beforeEach(function () {

    $this->starts_at = $this->faker->date($format = 'Y/m/d');

    $this->ends_at = $this->faker->date($format = 'Y/m/d');

    $this->room = Room::factory()->create([
        'name' => $this->faker->word,
        'capacity' => random_int(1, 10)
    ]);

    $this->booking = Booking::factory()->create([
        'room_id' => $this->room->id,
        'starts_at' => $this->starts_at,
        'ends_at' => $this->ends_at
    ]);
});

it('can calculate daily occupancy', function () {

    // How many days between two dates
    $diffInDays = Carbon::parse($this->ends_at)->diffInDays(Carbon::parse($this->starts_at));

    // Get a random number in the range of $diffInDays
    $randomDays = rand(0, $diffInDays);

    //add that many days to starts_at date
    $randomDate = Carbon::parse($this->starts_at)->addDays($randomDays);

    $date = Carbon::parse($randomDate)->format('Y-m-d');

    $response = $this->get('/api/daily-occupancy-rates/'.$date);

    $response->assertStatus(200);
});

it('can calculate daily occupancy with room ids', function () {

    // How many days between two dates
    $diffInDays = Carbon::parse($this->ends_at)->diffInDays(Carbon::parse($this->starts_at));

    // Get a random number in the range of $diffInDays
    $randomDays = rand(0, $diffInDays);

    //add that many days to starts_at date
    $randomDate = Carbon::parse($this->starts_at)->addDays($randomDays);

    $date = Carbon::parse($randomDate)->format('Y-m-d');

    $response = $this->get('/api/daily-occupancy-rates/'.$date.'?room_ids='."[$this->room->id]");

    $response->assertStatus(200);

    //might give response as "no booking for the date" or "test passes"
    //which in turn both are right. On re running the test the response can
    //change.
});
