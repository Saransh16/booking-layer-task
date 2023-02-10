<?php

namespace App\Repositories;

use App\Models\Room;
use App\Traits\DatabaseRepositoryTrait;
use App\Interfaces\RoomRepositoryInterface;

class RoomRepository implements RoomRepositoryInterface
{
    use DatabaseRepositoryTrait;

    /**
     * The model associated with the repository.
     *
     * @var \App\Models\Room
     */
    private $model = Room::class;
}
