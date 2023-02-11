<?php

namespace App\Rules;

use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CheckIfRoomIsAvailable implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $inputs = request()->only(['starts_at', 'ends_at']);

        //TO DO: refactor
        $room = Room::where('id', $value)->first();

        $inputs['starts_at'] = Carbon::parse($inputs['starts_at'])->format('Y-m-d');

        $inputs['ends_at'] = Carbon::parse($inputs['ends_at'])->format('Y-m-d');

        $booking_count = $room->bookings->where('starts_at', $inputs['starts_at'])->where('ends_at', $inputs['ends_at'])->count();

        if($booking_count < $room->capacity) return true;

        else return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Room is booked for these dates';
    }
}
