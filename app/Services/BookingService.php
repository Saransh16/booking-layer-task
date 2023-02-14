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

    public function update($id, $inputs)
    {
        $booking = $this->bookingRepo->get($id);

        if(!$booking) return ['success' => false, 'message' => 'Booking not found'];

        $booking = $this->bookingRepo->update($id, $inputs);

        return ['success' => true];
    }

}
