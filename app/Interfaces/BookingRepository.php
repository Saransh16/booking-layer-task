<?php

namespace App\Interfaces;

interface BookingRepository
{
    public function create(array $bookingDetails);
    public function update($bookingId, array $newDetails);
    public function get($bookingId);
    public function all();
}
