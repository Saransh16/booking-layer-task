<?php

namespace App\Services;

use App\Interfaces\RoomRepository;

class RoomService
{
    protected $roomRepo;

    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function create($inputs)
    {
        $room = $this->roomRepo->create($inputs);

        return $room;
    }

}
