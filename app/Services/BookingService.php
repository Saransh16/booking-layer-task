<?php

namespace App\Services;

use App\Interfaces\BookingRepository;

class BookingService
{
    protected $bookingRepo;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function create($inputs)
    {
        $booking = $this->bookingRepo->create($inputs);

        return $booking;
    }

}
