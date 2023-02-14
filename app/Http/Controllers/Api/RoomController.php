<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CreateRequest;
use App\Http\Requests\Room\OccupancyRateRequest;

class RoomController extends Controller
{
    protected $service;

    public function __construct(RoomService $roomService)
    {
        $this->service = $roomService;
    }

    public function create(CreateRequest $request)
    {
        $inputs = $request->validated();

        $room = $this->service->create($inputs);

        return response()->success($room);
    }

    public function dailyOccupancy($date)
    {
        $room_ids = in_array('room_ids', request()->all()) ?? json_decode(request()->all()['room_ids'], true);

        $data = $this->service->dailyOccupancy($date, $room_ids);

        if(!$data['success']) return response()->error('No booking for the date');

        else return response()->success(['occupancy_rate' => $data['occupancy_rate']]);
    }

    public function monthlyOccupancy($month)
    {
        $room_ids = in_array('room_ids', request()->all()) ?? json_decode(request()->all()['room_ids'], true);

        $response = $this->service->monthlyOccupancy($month, $room_ids);

        if(!$response['success']) return response()->error('No booking for the month');

        else return response()->success(['occupancy_rate' => $response['occupancy_rate']]);
    }
}
