<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Booking;
use App\Traits\DatabaseRepositoryTrait;
use App\Interfaces\BookingRepository as BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    use DatabaseRepositoryTrait;
    /**
     * The model associated with the repository.
     *
     * @var \App\Models\Booking
     */
    private $model = Booking::class;

    public function totalMonthlyOccupancy($month, $room_ids = null)
    {
        $query = $this->query();

        if($room_ids && count($room_ids))
        {
            $query = $query->whereIn('room_id', $room_ids);
        }

        $records = $query->whereMonth('starts_at', '=', $month)
                        ->whereMonth('ends_at', '=', $month)
                        ->get()->toArray();

        $occupancy = 0;

        foreach($records as $record)
        {
            $occupancy += Carbon::parse($record['starts_at'])->diffInDays($record['ends_at']) + 1;
        }

        return $occupancy;
    }
}
