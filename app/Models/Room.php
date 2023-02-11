<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity'
    ];

    /**
     * Get all of the bookings for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id', 'id');
    }

    public function isAvailable($starts_at, $ends_at)
    {
        $booking_count = $this->bookings->where('starts_at', Carbon::parse($starts_at)->format('Y-m-d'))
                                        ->where('ends_at', Carbon::parse($ends_at)->format('Y-m-d'))
                                        ->count();

        if($booking_count < $this->capacity) return true;

        else return false;
    }
}
