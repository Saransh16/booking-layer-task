<?php

namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService
{
    protected $bookingRepo;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function create($inputs)
    {
        $room = $this->bookingRepo->create($inputs);

        return $room;
    }

}
