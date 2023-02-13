<?php

namespace App\Services;

use App\Models\Booking;
use App\Interfaces\RoomRepository;
use App\Interfaces\BlockRepository;
use App\Interfaces\BookingRepository;

class RoomService
{
    protected $roomRepo;

    protected $bookingRepo;

    protected $blockRepo;

    public function __construct(
        RoomRepository $roomRepo,
        BookingRepository $bookingRepo,
        BlockRepository $blockRepo
    )
    {
        $this->roomRepo = $roomRepo;

        $this->bookingRepo = $bookingRepo;

        $this->blockRepo = $blockRepo;
    }

    public function create($inputs)
    {
        $room = $this->roomRepo->create($inputs);

        return $room;
    }

    public function dailyOccupancy($date)
    {
        $capacity = $this->roomRepo->totalCapacity();

        $occupancy = $this->bookingRepo->totalDailyOccupancy($date);

        $block = $this->blockRepo->totalDailyBlock($date);

        $occupancy_rate = ($occupancy) / ($capacity - $block);
    }
}
