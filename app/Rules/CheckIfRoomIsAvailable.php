<?php

namespace App\Rules;

use App\Models\Room;
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

        $room = Room::where('id', $value)->first();

        return $room->isAvailable($inputs['starts_at'], $inputs['ends_at']);
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
