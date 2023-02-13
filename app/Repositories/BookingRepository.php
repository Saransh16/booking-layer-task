<?php

namespace App\Repositories;

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

    public function totalDailyOccupancy($date)
    {
        $query = $this->query();

        $occupancy = $query->where('starts_at', '<=', $date)
                            ->where('ends_at', '>=', $date)
                            ->count();

        return $occupancy;
    }
}
