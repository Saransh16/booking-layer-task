<?php

namespace App\Interfaces;

interface RoomRepositoryInterface
{
    public function createRoom(array $roomDetails);
    public function updateRoom($roomId, array $newDetails);
    public function getRoomById($roomId);
    public function getAllRooms();
}
