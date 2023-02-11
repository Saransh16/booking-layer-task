<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Traits\DatabaseRepositoryTrait;
use App\Interfaces\BookingRepository as BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    use DatabaseRepositoryTrait;
    /**
     * The model associated with the repository.
     *
     * @var \App\Models\Booking
     */
    private $model = Booking::class;
}
