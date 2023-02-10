<?php

namespace App\Interfaces;

interface RoomRepositoryInterface
{
    public function create(array $roomDetails);
    public function update($roomId, array $newDetails);
    public function get($roomId);
    public function all();
}
