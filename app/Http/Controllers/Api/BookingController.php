<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\CreateRequest;

class BookingController extends Controller
{
    protected $service;

    public function __construct(BookingService $bookingService)
    {
        $this->service = $bookingService;
    }

    public function create(CreateRequest $request)
    {
        $inputs = $request->validated();

        $booking = $this->service->create($inputs);

        return response()->success($booking);
    }
}
