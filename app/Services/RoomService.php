<?php

namespace App\Services;

use Carbon\Carbon;
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

    public function dailyOccupancy($date, $room_ids)
    {
        $occupancy = $this->getDailyCount('booking', $date, $room_ids);

        if(!$occupancy) return ['success' => false];

        $capacity = $this->roomRepo->totalCapacity($room_ids);

        $block = $this->getDailyCount('block', $date, $room_ids);

        $occupancy_rate = ($occupancy) / ($capacity - $block);

        //round off to 2 decimals
        $occupancy_rate = round($occupancy_rate, 2);

        return ['success' => true, 'occupancy_rate' => $occupancy_rate];
    }

    public function getDailyCount($type, $date, $room_ids)
    {
        $repo = $type == 'booking' ? $this->bookingRepo : $this->blockRepo;

        if($room_ids && count($room_ids))
        {
            $query = $repo->getWhereIn('room_id', $room_ids);
        }

        $query = $repo->getWhereDate($date)->count();

        return $query;
    }

    public function monthlyOccupancy($month, $room_ids)
    {
        $occupancy = $this->bookingRepo->totalMonthlyOccupancy($month, $room_ids);

        if(!$occupancy) return ['success' => false];

        $capacity = $this->roomRepo->totalCapacity($room_ids);

        //get number of days in a month
        $days_in_month = Carbon::parse($month)->month($month)->daysInMonth;

        $capacity = $capacity * $days_in_month;

        $block = $this->blockRepo->totalMonthlyBlock("01", $room_ids);

        $occupancy_rate = ($occupancy) / ($capacity - $block);

        //round off to 2 decimals
        $occupancy_rate = round($occupancy_rate, 2);

        return ['success' => true, 'occupancy_rate' => $occupancy_rate];
    }
}
