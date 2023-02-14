<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'room_id' => fn () => Room::create(['name' => fake()->word, 'capacity' => random_int(1,10)])->getId(),
            'starts_at' => fake()->date($format = 'Y/m/d'),
            'ends_at' => fake()->date($format = 'Y/m/d')
        ];
    }
}
