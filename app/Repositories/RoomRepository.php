<?php

namespace App\Repositories;

use App\Models\Room;
use App\Interfaces\BookingRepository;
use App\Traits\DatabaseRepositoryTrait;
use App\Interfaces\RoomRepository as RoomRepositoryInterface;

class RoomRepository implements RoomRepositoryInterface
{
    use DatabaseRepositoryTrait;

    /**
     * The model associated with the repository.
     *
     * @var \App\Models\Room
     */
    private $model = Room::class;

    protected $bookingRepo;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function totalCapacity($room_ids = null)
    {
        $query = $this->query();

        if($room_ids && count($room_ids))
        {
            $query = $query->whereIn('id', $room_ids);
        }

        $query = $query->sum('capacity');

        return $query;
    }
}
