<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\CreateRequest;
use App\Http\Requests\Booking\UpdateRequest;

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

    public function update($id, UpdateRequest $request)
    {
        $inputs = $request->validated();

        $response = $this->service->update($id, $inputs);

        if(!$response['success']) return response()->error($response['message']);

        else return response()->message('Booking updated successfully');
    }
}
