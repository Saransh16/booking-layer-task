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
        $room_ids = json_decode(request()->all()['room_ids'], true);

        $occupancy = $this->service->dailyOccupancy($date, $room_ids);

        return response()->success($occupancy);
    }
}
