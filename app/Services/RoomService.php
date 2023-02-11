<?php

namespace App\Services;

use App\Interfaces\RoomRepository as RoomRepositoryInterface;

class RoomService
{
    protected $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function create($inputs)
    {
        $room = $this->roomRepo->create($inputs);

        return $room;
    }

}
